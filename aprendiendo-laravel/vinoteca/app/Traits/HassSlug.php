<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HassSlug
{
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function bootHassSlug(): void
    {
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
