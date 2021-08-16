<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Controllers\TaskController;
use App\Repositories\TaskRepository;
use App\Repositories\EloquentTaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(TaskController::class)
                  ->needs(TaskRepository::class)
                  ->give(function () {
                      return new EloquentTaskRepository();
                  });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
