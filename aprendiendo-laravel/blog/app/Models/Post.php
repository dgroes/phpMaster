<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //posts
    use HasFactory;

    //Asignación masiva
    /* protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
    ];
    */
    //Excluir asignación masiva
    protected $guarded = [
        'is_active',
    ];

    protected $table = 'post';

    //CASTEO DE VALORES
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean'
        ];
    }

    protected function title(): Attribute
    {


        return Attribute::make(
            set: function ($value) {
                return strtolower($value);
            },
            get: function ($value) {
                return ucfirst($value);
            }
        );
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /* public static function bootHasSlug(): void
    {
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    } */
}
