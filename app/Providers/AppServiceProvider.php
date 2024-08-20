<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Destino;
use App\Models\Nosotros;
use Illuminate\Support\ServiceProvider;
use App\Models\FooterText;
use Illuminate\Support\Facades\View;

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
    public function boot(): void
    {
        $footerText = FooterText::first();
        View::share('footerText', $footerText);

        $destinos = Destino::all();
        View::share('destinos', $destinos);

        $vistas = Nosotros::all();
        View::share('vistas', $vistas);

        $contacto = AboutUs::first();
        View::share('contacto', $contacto);
    }
}