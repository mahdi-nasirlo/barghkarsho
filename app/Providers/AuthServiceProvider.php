<?php

namespace App\Providers;

use App\Models\Course;
use App\Policies\Shop\CoursePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Course::class => CoursePolicy::class,
        'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',
        'App\Models\Course' => "App\Policies\Shop\CoursePolicy"
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
