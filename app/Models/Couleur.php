<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    protected $table = 'couleur';
    protected $primaryKey = 'idcouleur';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function fleures(){
        return $this->hasMany(Fleur::class);
    }
}