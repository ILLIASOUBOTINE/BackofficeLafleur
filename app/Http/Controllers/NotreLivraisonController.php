<?php

namespace App\Http\Controllers;

use App\Models\NotreLivraison;
use Illuminate\Http\Request;

class NotreLivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notreLivraisons = NotreLivraison::all();
        return view('notre_livraison.index', ['notreLivraisons'=>$notreLivraisons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notre_livraison.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nom_ville' => 'required|unique:notre_livraison|max:45',
        ]);
    
        $notreLivraison = new NotreLivraison();
        $notreLivraison->nom_ville = $request->input('nom_ville');
        $notreLivraison->save();
        return redirect()->route('notre_livraison.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotreLivraison  $notreLivraison
     * @return \Illuminate\Http\Response
     */
    public function show(NotreLivraison $notreLivraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotreLivraison  $notreLivraison
     * @return \Illuminate\Http\Response
     */
    public function edit(NotreLivraison $notreLivraison)
    {
        return view('notre_livraison.edit',['notreLivraison'=>$notreLivraison]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotreLivraison  $notreLivraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotreLivraison $notreLivraison)
    {
        $request->validate([
            'nom_ville' => 'required|unique:notre_livraison|max:45',
        ]);
        
        $notreLivraison->nom_ville = $request->input('nom_ville');
        $notreLivraison->save();
        return redirect()->route('notre_livraison.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotreLivraison  $notreLivraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotreLivraison $notreLivraison)
    {
        $notreLivraison->delete();
        return redirect()->route('notre_livraison.index');
    }
}