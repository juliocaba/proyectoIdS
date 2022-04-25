<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EstadisticaController extends AppBaseController
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
}