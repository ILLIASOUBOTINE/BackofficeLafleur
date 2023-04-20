<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\NotreLivraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $livraisons = Livraison::all();
       return view('livraison.index',['livraisons'=>$livraisons]);
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
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        $notreLivraisons = NotreLivraison::all();
        return view('livraison.edit',[
            'notreLivraisons'=>$notreLivraisons,
            'livraison'=>$livraison
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'date_prevu' => 'required|date',
            'date_livre' => 'nullable|date',
            'rue' => 'required|max:45',
            'num_maison' => 'required|max:5',
            'num_appart' => 'nullable|max:5',
            'num_telephone' => 'required|regex:/^[0-9]+$/i|size:10',
        ]);
        
       
        $livraison->date_prevu = $request->input('date_prevu');
        $livraison->date_livre = $request->input('date_livre');
        $livraison->notre_livraison_idnotre_livraison = $request->input('notre_livraison');
        $livraison->rue = $request->input('rue');
        $livraison->num_maison = $request->input('num_maison');
        $livraison->num_appart = $request->input('num_appart');
        $livraison->num_telephone = $request->input('num_telephone');
        
        $livraison->save();
        return redirect()->route('livraison.index',$livraison);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livraison $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function setDateLivre($id)
    {
        $livraison = Livraison::find($id);
        $livraison->date_livre = date('Y-m-d');
     
        
        $livraison->save();
        return redirect()->route('commande.today');
    }
}