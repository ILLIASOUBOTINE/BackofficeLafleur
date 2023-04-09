<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    protected $table = 'commandes';
    protected $primaryKey = 'idcommandes';
    public $timestamps = false;

    protected $fillable = [
        'date_create', 'num_commande', 'frais_livraison'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }
}