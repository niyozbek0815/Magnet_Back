<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kuryer extends Model
{
    use HasFactory;

    protected $table = 'kuryers';

    protected $fillable = [
      'name',
      'phone',
      'password',
      'is_status'
    ];

    public function kuryer_districts(): HasMany
    {
      return $this->hasMany(KuryerDistrict::class);
    }

    public function kuryer_orders(): HasMany
    {
      return $this->hasMany(KuryerOrder::class);
    }

    public function kuryer_products(): HasMany
    {
      return $this->hasMany(KuryerProduct::class);
    }
}
