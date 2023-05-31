<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    protected $fillable=['users_id','status_id','order_count','summa','tolov'];
    use HasFactory;

    public function orderproducts()
    {
        return $this->hasMany(OrderProducts::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function kuryer_order()
    {
        return $this->hasMany(KuryerOrder::class);
    }

    public function kuryer_products(): HasMany
    {
        return $this->hasMany(KuryerProduct::class);
    }
}
