<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    use HasFactory;

    
    /**
     * Allow mass assignment
     */
    protected $guarded = [];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
