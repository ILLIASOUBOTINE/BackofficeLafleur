<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    protected $table = 'produit';
    protected $primaryKey = 'idproduit';
    public $timestamps = false;
    protected $fillable = array('longueur','prix_unite','description','quantiteTotale','ventesTotales');
    
   

    public function unite(){
        return $this->belongsTo(Unite::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'categorie_has_produit','produit_idproduit','categorie_idcategorie');
    }
}