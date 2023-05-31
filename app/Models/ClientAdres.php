<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAdres extends Model
{
    use HasFactory;
    protected $fillable=['users_id','viloyat','tuman','maxalla','pochta', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function order()
    {
        return $this->hasMany(Orders::class,'adress_id');
    }
}
