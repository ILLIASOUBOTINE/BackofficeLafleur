<?php

namespace App\Http\Controllers;

use App\Models\BanniereEvent;
use App\Models\Photo;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BanniereEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $banniereEvents = BanniereEvent::all();
       return view('banniere_event.index',['banniereEvents'=>$banniereEvents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all();
        $produits = Produit::all();
        
        return view('banniere_event.create', [
            'photos'=>$photos,
            'produits'=>$produits
        ]);
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
            'titre' => 'required|unique:banniere_event|max:100',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'photo_idphoto' => 'required|integer',
            'description' => 'required|max:255',
        ]);
        
        $banniereEvent = new BanniereEvent();
        $banniereEvent->titre  = $request->input('titre');
        $banniereEvent->date_debut = $request->input('date_debut');
        $banniereEvent->date_fin = $request->input('date_fin');
        $banniereEvent->photo_idphoto = $request->input('photo_idphoto');
        $banniereEvent->description = $request->input('description');
        $banniereEvent->save();
        
       
        $banniereEvent->produits()->attach($request->input('produits')); 
        
        
        return redirect()->route('banniere_event.show',$banniereEvent);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function show(BanniereEvent $banniereEvent)
    {
        return view('banniere_event.show',['banniereEvent'=>$banniereEvent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(BanniereEvent $banniereEvent)
    {
        $photos = Photo::all();
        $produits = Produit::all();
        
        return view('banniere_event.edit', [
            'photos'=>$photos,
            'produits'=>$produits,
            'banniereEvent'=>$banniereEvent
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BanniereEvent $banniereEvent)
    {
        $request->validate([
            'titre' => ['required', 
            Rule::unique('banniere_event')->ignore($banniereEvent->idbanniere_event, 'idbanniere_event'),
            'max:100'],
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'photo_idphoto' => 'required|integer',
            'description' => 'required|max:255',
        ]);
        
        
        $banniereEvent->titre  = $request->input('titre');
        $banniereEvent->date_debut = $request->input('date_debut');
        $banniereEvent->date_fin = $request->input('date_fin');
        $banniereEvent->photo_idphoto = $request->input('photo_idphoto');
        $banniereEvent->description = $request->input('description');

        $banniereEvent->produits()->detach(); 
        $banniereEvent->save();
        
        $banniereEvent->produits()->attach($request->input('produits')); 
        return redirect()->route('banniere_event.show',$banniereEvent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BanniereEvent $banniereEvent)
    {
        $banniereEvent->produits()->detach();
        $banniereEvent->delete();
        return redirect()->route('banniere_event.index');
    }
}