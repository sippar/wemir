<?php

foreach(File::allFiles(__DIR__.'/wemir/routes') as $partial) {
    require_once $partial->getPathname();
}

Route::when('dashboard*', 'csrf', array('post'));

App::error(function($e){
//    return Redirect::route('dashboard.get.index');
});

#  listen to the queries and output them to learn!
/*
    Event::listen('illuminate.query', function($sql) {
        var_dump($sql);
    });
*/
