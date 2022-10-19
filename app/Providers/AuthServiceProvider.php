<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Author;
use App\Models\BookModel;
use App\Policies\PolicyBook;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        BookModel::class => PolicyBook::class ,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin' ,function (User $user ) {
            return $user->role === 2 ;
        });
        Gate::define('author' ,function (User $user ) {
            return $user->role === 1 ;
        });
        Gate::define('user' ,function (User $user ) {
            return $user->role === 0 ;
        });
    }
}
