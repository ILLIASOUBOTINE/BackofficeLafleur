<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;


class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unites = Unite::all();
        return view('unite.index', ['unites'=>$unites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:unite|max:45',
        ]);
    
        $unite = new Unite();
        $unite->nom = $request->input('nom');
        $unite->save();
        return redirect()->route('unite.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function show(Unite $unite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Unite $unite)
    {
        return view('unite.edit',['unite'=>$unite]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unite $unite)
    {
        $request->validate([
            'nom' => 'required|unique:unite|max:45',
        ]);
        
        $unite->nom = $request->input('nom');
        $unite->save();
        return redirect()->route('unite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unite $unite)
    {
        $unite->delete();
        return redirect()->route('unite.index');
    }
}