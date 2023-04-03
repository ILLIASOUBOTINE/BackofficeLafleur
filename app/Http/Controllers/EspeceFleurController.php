<?php

namespace App\Http\Controllers;

use App\Models\EspeceFleur;

use Illuminate\Http\Request;

class EspeceFleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especeFleurs = EspeceFleur::all();

        // dd($especeFleurs);
        return view('espece_fleur.index', ['especeFleurs'=>$especeFleurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('espece_fleur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:espece_fleur|max:45',
        ]);
    
        $especeFleur = new EspeceFleur();
        $especeFleur->nom = $request->input('nom');
        $especeFleur->save();
        return redirect()->route('espece_fleur.index');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show(EspeceFleur $especeFleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EspeceFleur  $especeFleur
     * @return \Illuminate\Http\Response
     */
    public function edit(EspeceFleur  $especeFleur)
    {
   
        return view('espece_fleur.edit',['especeFleur'=>$especeFleur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \App\Models\EspeceFleur  $especeFleur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EspeceFleur $especeFleur)
    {
        $request->validate([
            'nom' => 'required|unique:espece_fleur|max:45',
        ]);
        
        $especeFleur->nom = $request->input('nom');
        $especeFleur->save();
        return redirect()->route('espece_fleur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EspeceFleur  $especeFleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(EspeceFleur $especeFleur)
    {
        // dd($especeFleur);
        $especeFleur->delete();
        return redirect()->route('espece_fleur.index');
    }
}