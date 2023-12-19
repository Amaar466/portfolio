<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basic_projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'subtitle',
        'pictures',
        'featured',
        'slug',
        'link',
        'shortDescription',
        'category',
        'youtube_link',
    ];
}
