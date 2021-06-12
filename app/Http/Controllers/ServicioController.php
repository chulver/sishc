<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servicio;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:servicios.index')->only('index');
        $this->middleware('can:servicios.create')->only('create', 'store');
        $this->middleware('can:servicios.edit')->only('edit', 'update');
    }

    public function index()
    {
        $servicios = Servicio::where('estado','1')->get();

        return view('servicios.index', compact('servicios'));
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

        return redirect()->route('servicios.index')->with('info', 'El servicio se creo con exito');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);

        return view('servicios.edit', compact('servicio'));
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

        return redirect()->route('servicios.index')->with('info', 'El servicio fue actualizado con exito');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->estado='0';
        $servicio->update();

        return redirect()->route('servicios.index')->with('info', 'El servicio fue eliminado con exito');
    }
}
