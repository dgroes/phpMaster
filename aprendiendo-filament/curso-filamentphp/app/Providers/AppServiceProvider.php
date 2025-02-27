<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


     // Agregar colores para su uso
    public function boot(): void
    {
        FilamentColor::register([
            'indigo' => Color::Indigo,
            'cyan' => Color::Cyan,
            'lime' => Color::Lime,
            'rose' => Color::Rose,
            'mi-rosa' => '#ec407a', // Color personalizado en HEX
        ]);
    }
}
