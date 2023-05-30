<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuryerDistrict extends Model
{
    use HasFactory;

    protected $table = 'kuryer_districts';

    protected $fillable = [
      'kuryer_id',
      'region',
      'district'
    ];

    public function kuryer()
    {
      return $this->belongsTo(Kuryer::class);
    }
}
