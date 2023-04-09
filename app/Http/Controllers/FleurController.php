<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use App\Models\EspeceFleur;
use App\Models\Fleur;
use App\Models\Unite;
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
       
        $especeFleurs = EspeceFleur::all();
        $couleurs = Couleur::all();
        $unites = Unite::all();
        return view('fleur.create', ['especeFleurs'=>$especeFleurs,'couleurs'=>$couleurs, 'unites'=>$unites]);
        
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
            'longueur' => 'nullable|regex:/^[1-9][0-9]+$/i',
        ]);
        
        $fleur = new Fleur();
        $fleur->longueur = $request->input('longueur');
        $fleur->couleur_idcouleur = $request->input('couleur');
        $fleur->unite_idunite = $request->input('unite');
        $fleur->espece_fleur_idespece_fleur = $request->input('espece_fleur');
        $fleur->save();
        return redirect()->route('fleur.index');
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
        $especeFleurs = EspeceFleur::all();
        $couleurs = Couleur::all();
        $unites = Unite::all();
        return view('fleur.edit', ['especeFleurs'=>$especeFleurs,'couleurs'=>$couleurs, 'unites'=>$unites, 'fleur'=>$fleur]);
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
        $request->validate([
            'longueur' => 'nullable|regex:/^[1-9][0-9]+$/i',
        ]);
        
        $fleur->longueur = $request->input('longueur');
        $fleur->couleur_idcouleur = $request->input('couleur');
        $fleur->unite_idunite = $request->input('unite');
        $fleur->espece_fleur_idespece_fleur = $request->input('espace_fleur');
        $fleur->save();
        return redirect()->route('fleur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fleur  $fleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fleur $fleur)
    {
        $fleur->delete();
        return redirect()->route('fleur.index');
    }
}