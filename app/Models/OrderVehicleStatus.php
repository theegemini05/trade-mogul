<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderVehicleStatus extends Model
{
    protected $fillable = ['order_id', 'vehicle_id', 'depot_id', 'user_id'];

    public function order(){
        return $this->hasOne(Order::class);
    }

    public function vehicle(){
        return $this->hasOne(Vehicle::class);
    }

    public function depot(){
        return $this->hasOne(Depot::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
