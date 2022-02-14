<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarProductionDate extends Model
{
    use HasFactory;

    // model only has 1 production date
    public function carModel()
    {
        return $this->hasOne(CarModel::class);
    }
}
