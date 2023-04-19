<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cadeau extends Model
{
    protected $table = 'cadeau';
    protected $primaryKey = 'idcadeau';
    public $timestamps = false;
    protected $fillable = array('quantite');
    
    

    public function commandes():BelongsToMany {
        return $this->belongsToMany(Commande::class, 'cadeau_has_commandes','cadeau_idcadeau','commandes_idcommandes');
    }
    
    public function photo() {
        return $this->belongsTo(Photo::class);
    }
}