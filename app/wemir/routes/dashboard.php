<?php

Route::group([
        'namespace' => 'App\Controllers\Dashboard',
        'prefix'    => 'dashboard',
        //'before'    => 'auth.admin'
    ],function(){

        Route::get('login',
            [
                'uses'  => 'SessionsController@getLogin',
                'as'    => 'dashboard.get.login',
            ]
        );

        Route::post('login',
            [
                'as'    => 'dashboard.post.login',
                'uses'  => 'SessionsController@postLogin'
            ]
        );
        Route::get('logout',
            [
                'as'    => 'dashboard.get.logout',
                'uses'  => 'SessionsController@getLogout'
            ]
        );

        /* Protected Routes */
        Route::group(
            [
                'before'=>'auth.admin',
            ],
            function(){
                Route::get('/',
                    [
                        "as"=>"dashboard.get.index",
                        'uses'=>function(){
                            return View::make('dashboard.index');
                        },
                    ]
                );
                Route::resource('categories','CategoriesController');
                Route::resource('users','UsersController');
            }
        );
        /* End Protected Routes */
});

//Route::get('/', function()
//{
//    return View::make('hello');
//});