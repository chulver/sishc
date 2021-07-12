<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inyectable;
use App\Models\Paciente;

use DB;
use Carbon\Carbon;

class InyectableController extends Controller
{
    public function index()
    {
        $pacientes = DB::table('paciente as p')
                    ->select('p.id',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'))
                    ->get();
        return view('inyectables.index', compact('pacientes'));
    }

    public function registrar(Request $request)
    {
        $id = $request->get('paciente');

        $paciente = DB::table('paciente as p')
                    ->select('p.id',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'))
                    ->where('p.id', $id)
                    ->first();

        return view('inyectables.create', compact('paciente'));
    }
}
