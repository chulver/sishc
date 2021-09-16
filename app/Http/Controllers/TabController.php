<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servicio;

class TabController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('tabs.index');
    }

    public function tabla()
    {
        $servicios = Servicio::where('estado','1')->get();
        //return response()->json($servicios);
        return view('tabs.tabla', compact('servicios'));
    }

    public function frm()
    {
        return view('tabs.frm');
    }
}
