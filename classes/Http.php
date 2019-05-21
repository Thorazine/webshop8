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

        if($_SERVER['HTTP_HOST'] == 'localhost' && strpos($_SERVER['REQUEST_URI'], '/public/')) {
            $urlParts = explode('/public/', $_SERVER['REQUEST_URI']);

            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'].$urlParts[0].'/public/';
        }
        else {
            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'];
        }

        self::$docroot[0] = explode('/public/', __DIR__);


    }


    public static function asset($path)
    {
        return self::$webroot.'/'.ltrim('/'. $path);
    }


    public static function root($path)
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
