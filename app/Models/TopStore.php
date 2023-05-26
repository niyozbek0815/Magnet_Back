<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopStore extends Model
{
    use HasFactory;
    protected $fillable=['stores_id','top_type','tolov'];
    public function type()
    {
        return $this->belongsTo(TopStoreSettings::class,'id');
    }
    public function stores()
    {
        return $this->belongsTo(Stores::class);
    }



}
