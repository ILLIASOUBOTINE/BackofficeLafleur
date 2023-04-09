<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Livraison extends Model
{
    protected $table = 'livraison';
    protected $primaryKey = 'idlivraison';
    public $timestamps = false;
    protected $fillable = array('date_prevu','date_livre','rue','num_maison','num_appart','num_telephone');
    
    public function notreLivraison(){
        return $this->belongsTo(NotreLivraison::class);
    }

    public function commande() {
        return $this->hasOne(Commande::class);
    }
    
}