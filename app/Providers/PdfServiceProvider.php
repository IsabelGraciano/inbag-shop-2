<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Pdf;
use App\Util\PdfGenerate;

class PdfServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Pdf::class, function (){
            return new PdfGenerate();
        });
    }
}
