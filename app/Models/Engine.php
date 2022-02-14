<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;

    // a engines belongs to a model
    public function carModels()
    {
        return $this->belongsTo(CarModel::class);
    }
}
