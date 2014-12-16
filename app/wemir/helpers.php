<?php

if(! function_exists('getCurrentRoute'))
{
    /**
     * @param string $route
     * @return bool | string
     */
    function getCurrentRoute($route = '')
    {
        if(!empty($route)){
            if(Route::getCurrentRoute()->getName() === $route){
                return true;
            }
            return false;
        }
        return Route::getCurrentRoute()->getName();
    }
}

if(! function_exists('_pr')){
    function _pr($data, $die = false)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        !$die || die("#---------END---------#");
    }
}
if(! function_exists('dl')){
    function dl()
    {
        echo "<pre>";
        array_map(function($x) { var_dump($x); }, func_get_args());
        echo "</pre>";

    }
}