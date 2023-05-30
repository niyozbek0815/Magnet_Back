<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagnetSetting extends Model
{
    use HasFactory;

    protected $table = 'magnet_settings';

    protected $fillable = [
      'tashkent_dastavka',
      'region_dastavka',
      'product_percentage'
    ];
}
