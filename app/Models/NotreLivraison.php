<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotreLivraison extends Model
{
    protected $table = 'notre_livraison';
    protected $primaryKey = 'idnotre_livraison';
    public $timestamps = false;
    protected $fillable = array('nom_ville');

    public function livraisons(){
        return $this->hasMany(Livraison::class);
    }
}