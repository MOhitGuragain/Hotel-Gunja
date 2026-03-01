<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
    'image_path',
    'title',
    'category',
    'is_approved',
    'show_on_homepage'
];
}
