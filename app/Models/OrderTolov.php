<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTolov extends Model
{
    protected $fillable=['orders_id','massa_tolov','tolov','status'];
    use HasFactory;
    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }

}
