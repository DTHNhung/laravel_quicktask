<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    use HasFactory;

    protected $table = 'headquarters';

    protected $primaryKey = 'id';

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
