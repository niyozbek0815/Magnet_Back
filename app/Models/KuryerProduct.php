<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KuryerProduct extends Model
{
    use HasFactory;

    protected $table = 'kuryer_products';

    protected $fillable = [
      'kuryer_id',
      'product_id',
      'order_id',
      'store_id',
      'status_id',
      'order_product_id',
      'sub_product_id',
      'size_product_id'
    ];

    public function kuryer(): BelongsTo
    {
        return $this->belongsTo(Kuryer::class);
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function store()
    {
        return $this->belongsTo(Stores::class);
    }

    public function kuryer_status()
    {
        return $this->belongsTo(KuryerStatus::class);
    }

    public function order_product()
    {
        return $this->belongsTo(OrderProducts::class);
    }

    public function sub_product()
    {
        return $this->belongsTo(SubProducts::class);
    }

    public function size_product()
    {
        return $this->belongsTo(SizeProducts::class);
    }
}
