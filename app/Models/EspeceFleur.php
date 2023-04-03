<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspeceFleur extends Model
{
    protected $table = 'espece_fleur';
    protected $primaryKey = 'idespece_fleur';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function fleures(){
        return $this->hasMany(Fleur::class);
    }
}