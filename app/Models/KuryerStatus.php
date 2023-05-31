<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuryerStatus extends Model
{
    use HasFactory;

    protected $table = 'kuryer_statuses';

    protected $fillable = [
      'name_uz',
      'name_ru',
      'name_kr',
      'name_en',
    ];

    public function kuryer_products()
    {
      return $this->hasMany(KuryerProduct::class);
    }
}
