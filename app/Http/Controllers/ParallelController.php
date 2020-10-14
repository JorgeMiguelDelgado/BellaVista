<?php

namespace App\Http\Controllers;

use App\Models\Parallel;
use Illuminate\Http\Request;

class ParallelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("paralells.index",[
            'parallels'=>Parallel::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function show(Parallel $parallel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parallel $parallel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parallel $parallel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parallel $parallel)
    {
        //
    }
}
