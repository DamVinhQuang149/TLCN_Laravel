<?php



namespace App\Providers;

use App\Models\Comments;
use App\Models\Users;
use Illuminate\Support\Facades\Gate;


use App\Models\Team;

use App\Policies\TeamPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;



class AuthServiceProvider extends ServiceProvider
{

    /**

     * The policy mappings for the application.

     *

     * @var array<class-string, class-string>

     */

    protected $policies = [

        Team::class => TeamPolicy::class,

    ];



    /**

     * Register any authentication / authorization services.

     */

    public function boot(): void
    {

        $this->registerPolicies();

        Gate::define('my-comment', function (Users $user, Comments $comm) {
            return $user->user_id == $comm->user_id;
        });

    }



}

