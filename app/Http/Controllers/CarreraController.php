<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // LISTAR
        $lista_carreras = Carrera::paginate(10);
        return view("admin.carrera.listado", compact("lista_carreras"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // CREAR O CARGAR EL FORM DE CREACION
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // GUARDAR DATOS
        $request->validate([
            "nombre" => "required|unique:carreras"
        ]);

        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->nro_semestres = $request->nro_semestres;
        $carrera->detalle = $request->detalle;

        $carrera->save();

        return redirect()->back()->with("mensaje", "Carrera Registrada");
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // MOSTRAR POR ID
        $carrera = Carrera::find($id);
        $materias = $carrera->materias;

        //return reponse()->json($materias);
        return $materias;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // CARGAR EL FORM DE EDICION POR ID
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // MODIFICAR EN LA BASE DE DATOS
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ELIMINAR POR ID EN LA BASE DE DATOS
    }
}