<?php

namespace App\Providers;

use App\Department;
use App\Hospital;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view)
        {
            $user=auth()->user();
            if (!empty($user->hospital)){
                $department =Department::all()->where('hospital_id',$user->hospital->id);
            }else{
                $department=null;
            }
        $hospital =Hospital::all();

            $view->with(['deps'=>$department,'hos'=>$hospital,'_user'=>$user]);

        //
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
