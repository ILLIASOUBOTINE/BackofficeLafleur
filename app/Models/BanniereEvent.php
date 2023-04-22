<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanniereEvent extends Model
{
    protected $table = 'banniere_event';
    protected $primaryKey = 'idbanniere_event';
    public $timestamps = false;
    protected $fillable = array('titre','description','date_debut','date_fin');
    
    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function produits() {
        return $this->belongsToMany(Produit::class, 'banniere_event_has_produit','banniere_event_idbanniere_event','produit_idproduit');
    }
}