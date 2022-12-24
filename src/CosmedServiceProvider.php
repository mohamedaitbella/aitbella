<?php

namespace Aitbella\Cosmed;

use Aitbella\Cosmed\Commands\AdminCommand;
use Aitbella\Cosmed\Database\Seeders\DestinataireSeeder;
use Aitbella\Cosmed\View\Components\AppLayout;
use Database\Seeders\DatabaseSeeder;
use Aitbella\Cosmed\Database\Seeders\PaysSeeder;
use App\View\Components\GuestLayout;
use Error;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;

class CosmedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */

    public function boot()
    {

        // running only in console
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('cosmed.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/resources/views' => resource_path('views/'),
            ], 'cosmed-breeze');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/cosmed'),
            ], 'assets');*/

            // Publishing the translation files.
            $this->publishes([
                __DIR__ . '/lang' => resource_path('lang'),
            ], 'cosmed-lang');

            // Registering package commands.
            $this->commands([
                AdminCommand::class
            ]);
            // custom seed database
            $seed_list[] = PaysSeeder::class;
            $seed_list[] = DestinataireSeeder::class;
            $this->loadSeeders($seed_list);
        }
        // regester layouts 
        Blade::component('cosmed-app-layout', AppLayout::class);
        Blade::component('cosmed-guest-layout', GuestLayout::class);

        // regester component
        Blade::component('cosmed::input', 'input');
        Blade::component('cosmed::label', 'label');
        Blade::component('cosmed::error', 'error');
        Blade::component('cosmed::textarea', 'textarea');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // load lang
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'cosmed');

        // load migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Automatically apply the package configuration
        // $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cosmed');

        // load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'cosmed');
        // load Routes
        $this->loadRoutesFrom(__DIR__ . '/routes/cosmed-routes.php');
    }

    protected function loadSeeders($seed_list)
    {
        $this->callAfterResolving(DatabaseSeeder::class, function ($seeder) use ($seed_list) {
            foreach ((array) $seed_list as $path) {
                $seeder->call($seed_list);
                // cosmed seeder output message
                $output = new ConsoleOutput();
                $output->write("cosemed seeder $path \n");
            }
        });
    }
}
