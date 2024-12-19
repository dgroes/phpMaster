<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tags', // Añadir tags a los campos fillable
    ];

    protected $casts = [
        'tags' => 'array', // Añadir el cast de tags a array
    ];
}
