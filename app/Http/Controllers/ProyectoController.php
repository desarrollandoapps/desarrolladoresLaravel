<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Consulta de todos los proyectos ordenados por nombre ascendente
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
        // Enviar a la vista
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required',
            'duracion' => 'required'
        ]);

        // Almacenar el proyecto en la DB
        Proyecto::create($request->all());

        // Redirigir al index
        return redirect()->route('proyectos.index')->with('exito', 'Se ha guardado el proyecto exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Consulta
        $proyecto = Proyecto::FindOrFail($id);
        // Enviar a la vista
        return view('proyectos.view', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consulta
        $proyecto = Proyecto::FindOrFail($id);
        // Enviar a la vista
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required',
            'duracion' => 'required'
        ]);

        // Buscar el proyecto
        $proyecto = Proyecto::FindOrFail($id);

        // Actualización del proyecto
        $proyecto->update($request->all());

        // Redirigir al index
        return redirect()->route('proyectos.index')->with('exito', 'Se ha modificado el proyecto exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('exito', '¡Se ha eliminado el proyecto exitosamente!');
    }
}
