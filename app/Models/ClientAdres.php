<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientAdres extends Model
{
    use HasFactory;
    protected $fillable=['users_id','viloyat','tuman','maxalla','pochta'];
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
