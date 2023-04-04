<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couleurs = Couleur::all();
        return view('couleur.index', ['couleurs'=>$couleurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('couleur.create');
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
            'nom' => 'required|unique:couleur|max:45',
        ]);
    
        $couleur = new Couleur();
        $couleur->nom = $request->input('nom');
        $couleur->save();
        return redirect()->route('couleur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function show(Couleur $couleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function edit(Couleur $couleur)
    {
        return view('couleur.edit',['couleur'=>$couleur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couleur $couleur)
    {
        $request->validate([
            'nom' => 'required|unique:couleur|max:45',
        ]);
        
        $couleur->nom = $request->input('nom');
        $couleur->save();
        return redirect()->route('couleur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couleur $couleur)
    {
        $couleur->delete();
        return redirect()->route('couleur.index');
    }
}