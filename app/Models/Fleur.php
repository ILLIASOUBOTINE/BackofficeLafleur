<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fleur extends Model
{
    protected $table = 'fleures';
    protected $primaryKey = 'idfleures';
    public $timestamps = false;
    protected $fillable = array('longueur');
    
    public function couleur(){
        return $this->belongsTo(Couleur::class);
    }

    public function unite(){
        return $this->belongsTo(Unite::class);
    }

    public function espece_fleur(){
        return $this->belongsTo(EspeceFleur::class);
    }
    
    public function produits(): BelongsToMany {
        return $this->belongsToMany(Fleur::class, 'produit_has_fleures','fleures_idfleures','produit_idproduit');
    }
    
}