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

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Categorie::class, 'categorie_has_produit','produit_idproduit','categorie_idcategorie');
    }

    public function photos(): BelongsToMany {
        return $this->belongsToMany(Photo::class, 'photo_has_produit','produit_idproduit','photo_idphoto');
    }

    public function fleures(): BelongsToMany {
        return $this->belongsToMany(Fleur::class, 'produit_has_fleures','produit_idproduit','fleures_idfleures');
    }

    public function commandes() {
        return $this->belongsToMany(Produit::class, 'produit_has_commandes','produit_idproduit','commandes_idcommandes');
    }

    public function events() {
        return $this->belongsToMany(BanniereEvent::class, 'banniere_event_has_produit','produit_idproduit','banniere_event_idbanniere_event');
    }
}