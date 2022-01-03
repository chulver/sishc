<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inyectable;
use App\Models\InyectableMedicamento;
use App\Models\Paciente;
use App\Models\Medicamento;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class InyectableController extends Controller
{
    public function index()
    {
        $pacientes = DB::table('paciente as p')
                    ->select('p.id',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'))
                    ->get();
        return view('inyectables.index', compact('pacientes'));
    }

    public function historial(Request $request)
    {
        $request->validate([
            'paciente' => 'required'
        ]);

        //$id = $request->get('paciente');
        $id = $request->paciente;

        $paciente = DB::table('paciente as p')
                    ->select('p.id','p.apaterno','p.amaterno','p.nombre','p.sexo','p.fechanacimiento')
                    ->where('p.id', $id)
                    ->first();

        $historialinyectables = DB::table('inyectable as i')
                    ->select('i.id',DB::Raw('DATE(i.created_at) as fecha'),DB::Raw('TIME(i.created_at) as hora'),'i.via')
                    ->where('i.paciente_id', $id)
                    ->orderBy('fecha', 'desc')
                    ->get();

        //dd($paciente);

        return view('inyectables.historial', compact('paciente', 'historialinyectables'));
    }

    public function registrar($id)
    {
        $paciente = DB::table('paciente as p')
                    ->select('p.id','p.apaterno','p.amaterno','p.nombre','p.sexo','p.fechanacimiento')
                    ->where('p.id', $id)
                    ->first();

        $medicamentos = Medicamento::all();

        return view('inyectables.create', compact('paciente', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente' => 'required',
            'via' => 'required',
            'diagnostico' => 'required',
            'precio' => 'required',
            'medicamento' => 'required'
        ]);

        try{
            DB::beginTransaction();

            $inyectable = new Inyectable;

            $inyectable->paciente_id=$request->get('paciente');
            $inyectable->anios=$request->get('anios');
            $inyectable->meses=$request->get('meses');
            $inyectable->dias=$request->get('dias');
            $inyectable->diagnostico=$request->get('diagnostico');
            $inyectable->via=$request->get('via');
            $inyectable->precio=$request->get('precio');
            $inyectable->estado='1';

            $fecha = Carbon::now('America/La_Paz');
            $inyectable->created_at=$fecha->toDateTimeString();
            $inyectable->updated_at=$fecha->toDateTimeString();
            $inyectable->save();

            $idmedicamento=$request->get('medicamento');
            $observaciones=$request->get('observaciones');

            $cont=0;
            while( $cont < count($idmedicamento) ){
                $detalle = new InyectableMedicamento();
                $detalle->inyectable_id=$inyectable->id;
                $detalle->medicamento_id=$idmedicamento[$cont];
                $detalle->observaciones=$observaciones[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
        }

        return redirect()->route('inyectables.index')->with('info', 'Paciente registrado con exito');
        //return redirect()->route('inyectables.historial')->with('info', 'Paciente registrado con exito');
    }

    public function show($id)
    {
        $inyectable = DB::table('inyectable as i')
                        -> join('paciente as p','i.paciente_id','=','p.id')
                        -> select('p.apaterno','p.amaterno','p.nombre','p.sexo','i.anios','i.meses','i.dias','i.created_at','i.diagnostico','i.via','i.precio' )
                        -> where('i.id', $id)
                        -> first();

        $inyectable_medicamentos = DB::table('inyectable_medicamento as im')
                        -> join('medicamento as m','im.medicamento_id','=','m.id')
                        -> where('inyectable_id', $id)
                        -> get();

        return view('inyectables.show', compact('inyectable', 'inyectable_medicamentos'));
    }
}
