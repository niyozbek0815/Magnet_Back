<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mass extends Model
{
    use HasFactory;

    protected $table = 'masses';

    protected $fillable = [
      'product_id',
      'sub_product_id',
      'size_product',
      'mass'
    ];

    public function product(): BelongsTo
    {
      return $this->belongsTo(Products::class);
    }

    public function sub_product(): BelongsTo
    {
      return $this->belongsTo(SubProducts::class);
    }
}
