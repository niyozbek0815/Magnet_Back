<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AppStart extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'app_starts';

    protected $fillable = [
      'title',
      'text',
      'image',
      'order'
    ];
}
