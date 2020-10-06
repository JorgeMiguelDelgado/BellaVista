<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Genero;



class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$generos=Genero::get();
        $estudiantes=Estudiante::get();*/
        

        $estudiantes=Estudiante::with("genero")->paginate(10);
        return view("estudiantes.index", compact("estudiantes"),[
            "generos"=>Genero::get()
        ]);
        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos=Genero::get();
        $estudiante=new Estudiante;
        $title= __("Añadir Estudiante");
        $textButton=__("Crear");
        $route=route("estudiantes.store");
        return view("estudiantes.create", compact("title",
        "textButton", "route", "estudiante","generos"
        ));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "nombres"=>"required|max:90",
            "apellidos"=>"required|max:90",
            "direccion"=>"required|max:140",
            "fech_nac"=>"required",
            "tutor"=>"required|max:100",
            "Telf_tutor"=>"required|max:20",
            "autenticacion"=>"required|unique:estudiantes",
            "id_genero"=>"required"
        ]);
        Estudiante::create($request->only("nombres","apellidos","direccion","fech_nac","tutor","Telf_tutor","autenticacion","id_genero"));
        return redirect(route("estudiantes.index"))
            ->with("success", __("¡Estudiante registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
