<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Fleur;
use App\Models\Photo;
use App\Models\Produit;
use App\Models\Unite;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $produitsWithFleuresQuantite = Produit::with(['fleures' => function ($query) {
            $query->select('fleures.*', 'produit_has_fleures.quantite');
        }])->get();
      
        return view('produit.index', ['produitsWithFleuresQuantite'=>$produitsWithFleuresQuantite]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unites = Unite::all();
        $categories = Categorie::all();
        $photos = Photo::all();
        $fleures = Fleur::all();
        
        return view('produit.create', [
            
            'unites'=>$unites,
            'categories'=>$categories,
            'photos'=>$photos,
            'fleures'=>$fleures
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
            'nom' => 'required|unique:produit|max:45',
            'longueur' => 'nullable|integer|min:1',
            'prix_unite' => 'required|numeric|min:0|max:999.99',
            'description' => 'required|min:10|max:255',
            'quantiteTotale' => 'required|integer|min:1',
            'categories' => 'required',
            'photos' => 'required',
            'fleures' => 'required',
        ]);
        
        $produit = new Produit();
        $produit->nom = $request->input('nom');
        $produit->unite_idunite = $request->input('unite');
        $produit->longueur = $request->input('longueur');
        $produit->prix_unite = $request->input('prix_unite');
        $produit->quantiteTotale = $request->input('quantiteTotale');
        $produit->ventesTotales = 0;
        $produit->description = $request->input('description');
        $produit->save();
         
        $produit->categories()->attach($request->input('categories')); 
        $produit->photos()->attach($request->input('photos'));
        
        $quantites = $request->input('quantites');
        foreach($request->input('fleures') as $idfleur){
            $produit->fleures()->attach($idfleur,['quantite'=>$quantites[$idfleur]]); 
        }
        
        return redirect()->route('produit.show',$produit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $fleuresWithQuantite = $produit->fleures()->select('fleures.*', 'produit_has_fleures.quantite')->get();
        return view('produit.show', [
            'produit'=>$produit,
            'fleuresWithQuantite'=>$fleuresWithQuantite
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $unites = Unite::all();
        $categories = Categorie::all();
        $photos = Photo::all();
        $fleures = Fleur::all();
        $fleuresWithQuantite = $produit->fleures()->select('fleures.*', 'produit_has_fleures.quantite')->get();
        // dd($produit->categories);
        
        return view('produit.edit', [
            'produit'=>$produit,
            'unites'=>$unites,
            'categories'=>$categories,
            'photos'=>$photos,
            'fleures'=>$fleures,
            'fleuresWithQuantite'=>$fleuresWithQuantite
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|max:45',
            'longueur' => 'nullable|integer|min:1',
            'prix_unite' => 'required|numeric|min:0|max:999.99',
            'description' => 'required|min:10|max:255',
            'quantiteTotale' => 'required|integer|min:1',
            'categories' => 'required',
            'photos' => 'required',
            'fleures' => 'required',
        ]);
        
       
        $produit->nom = $request->input('nom');
        $produit->unite_idunite = $request->input('unite');
        $produit->longueur = $request->input('longueur');
        $produit->prix_unite = $request->input('prix_unite');
        $produit->quantiteTotale = $request->input('quantiteTotale');
        // $produit->ventesTotales = 0;
        $produit->description = $request->input('description');
        
        $produit->categories()->detach(); 
        $produit->photos()->detach(); 
        $produit->fleures()->detach(); 
        $produit->save();
         
        $produit->categories()->attach($request->input('categories')); 
        $produit->photos()->attach($request->input('photos'));
        
        $quantites = $request->input('quantites');
        foreach($request->input('fleures') as $idfleur){
            $produit->fleures()->attach($idfleur,['quantite'=>$quantites[$idfleur]]); 
        }
        
        return redirect()->route('produit.show',$produit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->categories()->detach(); 
        $produit->photos()->detach(); 
        $produit->fleures()->detach();
        $produit->delete();
        return redirect()->route('produit.index');
    }
}