<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopStoreSettings extends Model
{
    protected $fillable=['start','stop','name_uz','name_kr','name_ru','name_en','summa','continuity'];
    use HasFactory;
    public function topstores()
    {
        return $this->hasMany(TopStore::class,'top_type');
    }
}
