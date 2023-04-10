<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Error;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $commandes = Commande::all();
    //    return view('commande.index', ['commandes'=>$commandes]);
    
        // $commandesWithProduitsQuantite = Commande::with(['produits'=>function($query){
        //     $query->select('produit.*','produit_has_commandes.quantite');
        // }])->get();

        $commandesWithProduitsQuantiteWithPrixtotal = Commande::with(['produits'=>function($query){
            $query->select('produit.*','produit_has_commandes.quantite')
            ->selectRaw('SUM(produit.prix_unite*produit_has_commandes.quantite) as total_produit')
            ->groupBy('produit.idproduit', 'produit_has_commandes.quantite','produit_has_commandes.commandes_idcommandes');
        }])->get();
        
        // dd($commandesWithProduitsQuantiteWithPrixtotal);

        $commandesWithProduitsQuantiteWithPrixtotal->each(function($commande){
            $commande->total_commande = $commande->produits->SUM('total_produit');
        });   
        
        $e = request('error');

        // dd($e);
        return view('commande.index', [
            'commandesWithProduitsQuantiteWithPrixtotal'=>$commandesWithProduitsQuantiteWithPrixtotal,
            'e' => $e
            
        ]);
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
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
      
        $produits = $commande->produits()->select('produit.*','produit_has_commandes.quantite')->get();
         
        $prixCommande = 0;
        foreach($produits as $produit){
            $prixCommande += $produit->prix_unite*$produit->quantite; 
        }
        $commande->total_commande = $prixCommande;
        //  dd( $commande);
        
         
      
        return view('commande.show', [
            'commande'=>$commande,
            'produits'=>$produits
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(Request $request)
    {
        // dd($request);
        $request->validate([
            'id' => 'required|integer|min:1',
            
        ]);
        
        try {
             $commande = Commande::findOrFail($request->input('id'));
        }catch (ModelNotFoundException $error){
            return redirect()->route('commande.index',['error'=>"la commande avec id = ".$request->input('id')."  n'existe pas"]);
        }
       
        return redirect()->route('commande.show',$commande);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nonLivres()
    {
        $commandesWithProduitsQuantiteWithPrixtotal = Commande::with(['produits'=>function($query){
            $query->select('produit.*','produit_has_commandes.quantite')
            ->selectRaw('SUM(produit.prix_unite*produit_has_commandes.quantite) as total_produit')
            ->groupBy('produit.idproduit', 'produit_has_commandes.quantite','produit_has_commandes.commandes_idcommandes');
        }])
        ->whereHas('livraison', function ($query) {
            $query->where('date_livre', null);
        })->get();
        
         $commandesWithProduitsQuantiteWithPrixtotal->each(function($commande){
            $commande->total_commande = $commande->produits->SUM('total_produit');
        });   
        
        return view('commande.result', [
            'commandesWithProduitsQuantiteWithPrixtotal'=>$commandesWithProduitsQuantiteWithPrixtotal,
            'title'=>"Non livrés"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function livre()
    {
        $commandesWithProduitsQuantiteWithPrixtotal = Commande::with(['produits'=>function($query){
            $query->select('produit.*','produit_has_commandes.quantite')
            ->selectRaw('SUM(produit.prix_unite*produit_has_commandes.quantite) as total_produit')
            ->groupBy('produit.idproduit', 'produit_has_commandes.quantite','produit_has_commandes.commandes_idcommandes');
        }])
        ->whereHas('livraison', function ($query) {
            $query->whereNotNull('date_livre');
        })->get();
        
         $commandesWithProduitsQuantiteWithPrixtotal->each(function($commande){
            $commande->total_commande = $commande->produits->SUM('total_produit');
        });   
        
        return view('commande.result', [
            'commandesWithProduitsQuantiteWithPrixtotal'=>$commandesWithProduitsQuantiteWithPrixtotal,
            'title'=>"Livré"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function today()
    {
        $commandesWithProduitsQuantiteWithPrixtotal = Commande::with(['produits'=>function($query){
            $query->select('produit.*','produit_has_commandes.quantite')
            ->selectRaw('SUM(produit.prix_unite*produit_has_commandes.quantite) as total_produit')
            ->groupBy('produit.idproduit', 'produit_has_commandes.quantite','produit_has_commandes.commandes_idcommandes');
        }])
        ->whereHas('livraison', function ($query) {
            $query->where('date_prevu', date('Y-m-d'));
        })->get();
        
         $commandesWithProduitsQuantiteWithPrixtotal->each(function($commande){
            $commande->total_commande = $commande->produits->SUM('total_produit');
        });   
        
        return view('commande.result', [
            'commandesWithProduitsQuantiteWithPrixtotal'=>$commandesWithProduitsQuantiteWithPrixtotal,
            'title'=>"Expédition aujourd'hui"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tomorrow()
    {
        $tomorrow = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')));
        $commandesWithProduitsQuantiteWithPrixtotal = Commande::with(['produits'=>function($query){
            $query->select('produit.*','produit_has_commandes.quantite')
            ->selectRaw('SUM(produit.prix_unite*produit_has_commandes.quantite) as total_produit')
            ->groupBy('produit.idproduit', 'produit_has_commandes.quantite','produit_has_commandes.commandes_idcommandes');
        }])
        ->whereHas('livraison', function ($query) use($tomorrow) {
            $query->where('date_prevu', $tomorrow);
        })->get();
        
         $commandesWithProduitsQuantiteWithPrixtotal->each(function($commande){
            $commande->total_commande = $commande->produits->SUM('total_produit');
        });   
        
        return view('commande.result', [
            'commandesWithProduitsQuantiteWithPrixtotal'=>$commandesWithProduitsQuantiteWithPrixtotal,
            'title'=>"Livraison demain"
        ]);
    }

    /**
     * Display a listing of the resource.
     * 
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByDate(Request $request)
    {
        $date_prev = $request->input('date_prev');
        $commandesWithProduitsQuantiteWithPrixtotal = Commande::with(['produits'=>function($query){
            $query->select('produit.*','produit_has_commandes.quantite')
            ->selectRaw('SUM(produit.prix_unite*produit_has_commandes.quantite) as total_produit')
            ->groupBy('produit.idproduit', 'produit_has_commandes.quantite','produit_has_commandes.commandes_idcommandes');
        }])
        ->whereHas('livraison', function ($query) use( $date_prev ) {
            $query->where('date_prevu',$date_prev);
        })->get();
        
         $commandesWithProduitsQuantiteWithPrixtotal->each(function($commande){
            $commande->total_commande = $commande->produits->SUM('total_produit');
        });   
        
        return view('commande.result', [
            'commandesWithProduitsQuantiteWithPrixtotal'=>$commandesWithProduitsQuantiteWithPrixtotal,
            'title'=>"Livraison prevu: ".$date_prev,
        ]);
    }
}