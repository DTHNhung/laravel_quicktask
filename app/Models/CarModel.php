<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    
    protected $table = 'car_models';

    protected $primaryKey = 'id';

    //a model belongs to a car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // a model has many engines
    public function engines()
    {
        return $this->hasMany(Engine::class);
    }
}
