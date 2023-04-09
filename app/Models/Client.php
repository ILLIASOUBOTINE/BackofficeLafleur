<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'idclient';
    public $timestamps = false;
    protected $fillable = array('email','mot_passe');

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}