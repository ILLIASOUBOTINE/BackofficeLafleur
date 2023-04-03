<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    protected $table = 'categorie';
    protected $primaryKey = 'idcategorie';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'categorie_has_produit', 'categorie_idcategorie', 'produit_idproduit');
    }
}