<?php namespace App\Controllers\Dashboard;

use DashboardController;
use Sentry;
use Input;
use Redirect;
use View;


class SessionsController extends DashboardController
{
    /**
     * @return mixed
     */
    public function getLogin()
    {
        if( Sentry::check()) {
            return Redirect::route('dashboard.categories.index');
        }
        return View::make('dashboard.login.signin');
    }

    /**
     * @return mixed
     */
    public function postLogin()
    {
        $credentials = [
            'email'   =>trim(Input::get('email')),
            'password'=>trim(Input::get('password'))
        ];

        $rememberMe = ( count(Input::get('remember')) ) ? true : false;

        try {
            $user = Sentry::authenticate($credentials,$rememberMe);

            if( $user ) {
                return Redirect::route('dashboard.index');
            }

        }catch (\Exception $e) {
            return Redirect::back()->withErrors(['login'=>$e->getMessage()]);
        }

        return Redirect::route('dashboard.index');
    }

    /**
     * @return mixed
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('dashboard.get.login');
    }
} 