<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable=['name_uz','name_kr','name_ru','name_en'];
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

}
