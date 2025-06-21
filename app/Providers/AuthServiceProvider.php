<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Tambahkan model dan policy yang ingin kamu daftarkan
use App\Models\AssetReport;
use App\Policies\AssetReportPolicy;
use App\Models\Asset;
use App\Policies\AssetPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        AssetReport::class => AssetReportPolicy::class,
        Asset::class => AssetPolicy::class,
    ];



    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', fn($user) => $user->is_admin);
    }
}
