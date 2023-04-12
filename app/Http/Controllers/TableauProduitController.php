<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableauProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        
        return view('tableau_produit.index', [
            'produits'=>$produits,
        ]);
       
    }

    /**
     * Display a listing of the resource.
     * 
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByDateListProduitVendu(Request $request)
    {   

      
        $request->validate([
            'date_start' => 'required',
            'date_end' => 'required',
        ]); 
           
         
        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');
        $produits = Produit::all();
        
        $produitsVendus = Produit::join('produit_has_commandes', 'produit.idproduit', '=', 'produit_has_commandes.produit_idproduit')
        ->join('commandes','commandes.idcommandes','=', 'produit_has_commandes.commandes_idcommandes')
        ->whereBetween('commandes.date_create',[$dateStart, $dateEnd])
        ->select('produit.*', DB::raw('SUM(produit_has_commandes.quantite) as total_quantite'))
        // ->selectRaw('SUM(produit_has_commandes.quantite) as total_quantite')
        ->groupBy('produit.idproduit')
        ->get();
        // $produitsVendus = $produitsVendus->toArray();
        // $produitsVendus1 = array_map(fn($value) => $value['idproduit'], $produitsVendus1);
        //   dd($produitsVendus);
        
        return view('tableau_produit.result', [
            'produits'=>$produits,
            'produitsVendus'=>$produitsVendus,
            'title'=>"vendu entre ".$dateStart." et ".$dateEnd,
        ]);
    }

}