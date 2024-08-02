<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img_banner',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
