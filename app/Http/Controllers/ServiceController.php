<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servicio;

class ServiceController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('services.index');
        //$servicios = Servicio::where('estado','1')->get();

        //return response()->json($servicios);
        //return datatables()->of($servicios)->toJson();
    }

    public function tabla()
    {
        $servicios = Servicio::where('estado','1')->get();
        //return response()->json($servicios);
        return view('services.tabla', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio' => 'required',
            'precio' => 'required'
        ]);

        $servicio = new Servicio;

        $servicio->serviciomedico=$request->get('servicio');
        $servicio->precio=$request->get('precio');
        $servicio->estado='1';
        $servicio->save();

        //return redirect()->route('servicios.index')->with('info', 'El servicio se creo con exito');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return response()->json($servicio);
        //return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'servicio' => 'required',
            'precio' => 'required'
        ]);

        $servicio = Servicio::findOrFail($id);

        $servicio->serviciomedico=$request->get('servicio');
        $servicio->precio=$request->get('precio');
        $servicio->update();

        //return redirect()->route('servicios.index')->with('info', 'El servicio fue actualizado con exito');
    }

    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return response()->json($servicio);
        //return view('servicios.edit', compact('servicio'));
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->estado='0';
        $servicio->update();

        //return redirect()->route('servicios.index')->with('info', 'El servicio fue eliminado con exito');
    }
}
