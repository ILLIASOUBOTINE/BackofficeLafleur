<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    protected $table = 'unite';
    protected $primaryKey = 'idunite';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function fleures(){
        return $this->hasMany(Fleur::class);
    }

    public function prduits(){
        return $this->hasMany(Produit::class);
    }
}