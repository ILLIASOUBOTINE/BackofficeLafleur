<?php

namespace App\Http\Controllers;

use App\Models\Cadeau;
use App\Models\Photo;
use Illuminate\Http\Request;

class CadeauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadeaux = Cadeau::all();
        
        return view('cadeau.index',['cadeaux'=>$cadeaux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all();
        
        return view('cadeau.create',['photos'=>$photos]);
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
            'nom' => 'required|unique:cadeau|max:100',
            'quantite' => 'required|integer|min:0',
            'photo' => 'required',
        ]);
        
        $cadeau = new Cadeau();
        $cadeau->nom = $request->input('nom');
        $cadeau->quantite = $request->input('quantite');
        $cadeau->photo_idphoto = $request->input('photo');
        $cadeau->save();
        return redirect()->route('cadeau.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cadeau  $cadeau
     * @return \Illuminate\Http\Response
     */
    public function show(Cadeau $cadeau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cadeau  $cadeau
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadeau $cadeau)
    {
        $photos = Photo::all();
        
        return view('cadeau.edit',['photos'=>$photos,'cadeau'=>$cadeau]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cadeau  $cadeau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadeau $cadeau)
    {
        $request->validate([
            'nom' => 'required|unique:cadeau|max:100',
            'quantite' => 'required|integer|min:0',
            'photo' => 'required',
        ]);
        
        
        $cadeau->nom = $request->input('nom');
        $cadeau->quantite = $request->input('quantite');
        $cadeau->photo_idphoto = $request->input('photo');
        $cadeau->save();
        return redirect()->route('cadeau.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cadeau  $cadeau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadeau $cadeau)
    {
        $cadeau->commandes()->detach();
        $cadeau->delete();
        return redirect()->route('cadeau.index');
    }
}