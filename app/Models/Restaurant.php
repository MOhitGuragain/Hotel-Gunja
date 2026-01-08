<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model
{
    protected $fillable = ['name','location','opening_time','closing_time'];

    public function tables()
    {
        return $this->hasMany(RestaurantTable::class);
    }
}
