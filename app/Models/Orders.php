<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable=['users_id','status_id','adress_id','order_count','summa','tolov'];
    use HasFactory;
    public function orderproducts()
    {
        return $this->hasMany(OrderProducts::class);
    }
    public function adress()
    {
        return $this->belongsTo(ClientAdres::class,'id');
    }
    public function tolov()
    {
        return $this->hasOne(OrderTolov::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
