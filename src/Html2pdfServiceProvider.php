<?php

namespace NahidulHasan\Html2pdf;

use Illuminate\Support\ServiceProvider;

class Html2pdfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       // include __DIR__.'/routes/web.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       // $this->app->make('NahidulHasan\Html2pdf\Html2pdfController');
        $this->app->make('NahidulHasan\Html2pdf\Html2pdfService');
    }
}