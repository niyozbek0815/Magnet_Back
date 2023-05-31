<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppStart extends Model
{
    use HasFactory;

    protected $table = 'app_starts';

    protected $fillable = [
      'title',
      'text',
      'image',
      'order'
    ];
}
