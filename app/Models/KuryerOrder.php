<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KuryerOrder extends Model
{
    use HasFactory;

    protected $table = 'kuryer_orders';

    protected $fillable = [
      'kuryer_id',
      'order_id',
      'address_id',
      'count',
      'status'
    ];

    public function kuryer(): BelongsTo
    {
        return $this->belongsTo(Kuryer::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(ClientAdres::class);
    }
}
