<?php

Class Http
{

    public static $webroot = '';
    public static $docroot = '';


    public static function boot()
    {
        // we gaan alles bepalen qua path en webroot en whatever

        // opzoek naar localhost
        // opzoek naar de eerste /public/
        // als gevonden, dan update webroot
        // zo niet, dan is webroot domein

        if(in_array($_SERVER['HTTP_HOST'], ['localhost', 'localhost:8080', 'localhost:8888']) && strpos($_SERVER['REQUEST_URI'], '/public/')) {
            $urlParts = explode('/public/', $_SERVER['REQUEST_URI']);

            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'].$urlParts[0].'/public';

            // dd($urlParts[0]);

            // self::$docroot = explode('/public', $urlParts[0])[0];
        }
        else {
            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'];
        }

        // dd(self::$webroot.' - '. __DIR__);
        // self::$docroot = explode('/public', __DIR__)[0];


    }


    public static function asset($path = '')
    {
        return self::$webroot.ltrim('/'. $path);
    }


    public static function redirect($path = '')
    {
        header('Location: '.self::asset($path));
    }


    public static function root($path = '')
    {
        return self::$docroot.'/'.ltrim('/'. $path);
    }


    private static function httpOrHttps()
    {
        if(isset($_SERVER['HTTPS'])) {
            return 'https://';
        }
        return 'http://';
    }

}
