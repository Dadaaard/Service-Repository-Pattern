<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\PostInterface;
use App\Repositories\PostRepository;
use App\Events\UserCreated;
use App\Listeners\UserCreatedLog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostInterface::class, PostRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
