<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\Admin;
use App\Models\Event;
use Flash;
use App\Http\Controllers\Controller;
use Response;

class EstadisticaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        return view('admin.estadistica.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.estadistica.index');
    }

    public function stats() {
        $cant_perros_pequeños = Event::where('animal_size', 'pequeño')->where('state', 'finalizado')->count();
        $cant_perros_medianos = Event::where('animal_size', 'mediano')->where('state', 'finalizado')->count();
        $cant_perros_grandes = Event::where('animal_size', 'grande')->where('state', 'finalizado')->count();
        $cant_perros_corte = Event::where('type_service', 'corte')->where('state', 'finalizado')->count();
        $cant_perros_banio = Event::where('type_service', 'baño')->where('state', 'finalizado')->count();
        $cant_perros_ambos = Event::where('type_service', 'ambos')->where('state', 'finalizado')->count();
        $res = [
            'cantPerrosPequeños' => $cant_perros_pequeños,
            'cantPerrosMedianos' => $cant_perros_medianos,
            'cantPerrosGrandes' => $cant_perros_grandes,
            'cantPerrosCorte' => $cant_perros_corte,
            'cantPerrosBanio' => $cant_perros_banio,
            'cantPerrosAmbos' => $cant_perros_ambos     
        ];

        return response()->json($res);
    }
}