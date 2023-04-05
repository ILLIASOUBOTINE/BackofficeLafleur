<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Photo extends Model
{
    protected $table = 'photo';
    protected $primaryKey = 'idphoto';
    public $timestamps = false;
    protected $fillable = array('img_url');

    public function produits(): BelongsToMany{
        return $this->belongsToMany(Produit::class, 'photo_has_produit', 'photo_idphoto', 'produit_idproduit');
    }
}