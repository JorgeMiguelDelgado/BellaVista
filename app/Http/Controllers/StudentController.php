<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::with("genero")->paginate(10);
        return view("students.index", compact("students"),[
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
        $student=new Student;
        $title= __("Añadir Estudiante");
        $textButton=__("Crear");
        $route=route("students.store");
        return view("students.create", compact("title",
        "textButton", "route", "student","generos"
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
            "autenticacion"=>"required|unique:students",
            "id_genero"=>"required"
        ]);
        Student::create($request->only("nombres","apellidos","direccion","fech_nac","tutor","Telf_tutor","autenticacion","id_genero"));
        return redirect(route("students.index"))
            ->with("success", __("¡Estudiante registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $update=true;
        $title= __("Editar datos del Alumno");
        $generos=Genero::get();
        $textButton=__("Actualizar");
        $route=route("students.update",["student"=>$student]);
        return view("students.edit", compact("update", "title","textButton","route","student", "generos"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request,[
            "nombres"=>"required",
            "apellidos"=>"required|max:90",
            "direccion"=>"required|max:140",
            "fech_nac"=>"required",
            "tutor"=>"required|max:100",
            "Telf_tutor"=>"required|max:20",
            "autenticacion"=>"required",
            "id_genero"=>"required"

        ]);
        $student->fill($request->only("nombres","apellidos","direccion","fech_nac","tutor","Telf_tutor","autenticacion","id_genero"))->save();
        return back()->with("success", __("¡Datos de estudiante actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with("success", __("¡Datos de Estudiante Eliminado!"));
    }
}
