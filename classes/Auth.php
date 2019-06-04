<?php

class Auth {

    private static $user = [];

    public static function check()
    {
        if (@$_SESSION['user']) {
            return true;
        }
        return false;
    }


    public static function user()
    {
        return @$_SESSION['user'];
    }


    public static function attempt($email, $password)
    {
        // SELECT * FROM users WHERE email = :email
        $db = new DB;
        $user = $db->find('SELECT * FROM users WHERE email = :email', ['email' => $email]);

        $loggedIn = password_verify($password, $user['password']);

        if($loggedIn) {
            self::$user = $user; // database data
            $_SESSION['user'] = $user;
            return $user;
        }
        else {
            return false;
        }
    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }
}
