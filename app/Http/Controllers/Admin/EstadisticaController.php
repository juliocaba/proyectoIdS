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
        $cant_perros_pequeños = Event::where('animal_size', 'pequeño')->count();
        $res = [
            'cantPerrosPequeños' => $cant_perros_pequeños 
        ];

        return response()->json($res);
    }
}