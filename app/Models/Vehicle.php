<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * Allow mass assignment
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'in_service' => 'integer',
        'constructor_id' => 'integer'
    ];

    public function constructor()
    {
        return $this->belongsTo(Constructor::class);
    }

}
