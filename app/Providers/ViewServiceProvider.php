<?php

namespace App\Providers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Status;
use App\Ticket;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot(Guard $auth)
    {
        view()->composer('layouts.sidemenu.sidemenu', function ($view) use ($auth)
        {
            $status = Status::getAll();
            $tickets_all = Ticket::getNbTicket();
            $user = $auth->user();
            $ticket_all_your = Ticket::getNbYourTicket($user->id);
            $menu_roles = Role::getAll();
            $view->with([
                'menu_roles' => $menu_roles,
                'status' => $status,
                'tickets_all_your' => $ticket_all_your,
                'tickets_all' => $tickets_all,
                'user' => $user
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}