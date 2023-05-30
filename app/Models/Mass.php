<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
