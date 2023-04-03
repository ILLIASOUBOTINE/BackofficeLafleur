<?php

namespace App\Http\Controllers;

use App\Models\Fleur;
use Illuminate\Http\Request;

class FleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleures = Fleur::all();
        
        return view('fleur.index',['fleures'=>$fleures]);
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
     * @param  \App\Models\Fleur  $fleur
     * @return \Illuminate\Http\Response
     */
    public function show(Fleur $fleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fleur  $fleur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fleur $fleur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fleur  $fleur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fleur $fleur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fleur  $fleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fleur $fleur)
    {
        //
    }
}