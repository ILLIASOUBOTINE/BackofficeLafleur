<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    protected $table = 'commandes';
    protected $primaryKey = 'idcommandes';
    public $timestamps = false;

    protected $fillable = [
        'date_create', 'num_commande', 'frais_livraison'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }

    public function produits():BelongsToMany {
        return $this->belongsToMany(Produit::class, 'produit_has_commandes','commandes_idcommandes','produit_idproduit');
    }

    public function cadeaux():BelongsToMany {
        return $this->belongsToMany(Cadeau::class, 'cadeau_has_commandes','commandes_idcommandes','cadeau_idcadeau');
    }
}