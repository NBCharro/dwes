<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Transforma el texto en mayusculas
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('mayus', function ($string) {
            return "<?php echo strtoupper($string) ?>";
        });
    }
}
