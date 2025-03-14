<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define as rotas para o aplicativo.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes(); // Carrega o arquivo api.php
    }

    /**
     * Mapear as rotas de API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')   // Prefixo 'api', deve ser acessado com /api
            ->middleware('api') // Middleware para API
            ->namespace($this->namespace) // Namespace do controlador
            ->group(base_path('routes/api.php')); // Arquivo onde as rotas são definidas
    }

    public function boot()
{
    $this->routes(function () {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    });
}

}
