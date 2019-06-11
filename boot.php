<?php
session_start();

include 'helpers/functions.php';

// classes inladen
include 'classes/Http.php';
Http::boot();
include 'classes/Cart.php';
Cart::boot();
include 'classes/Auth.php';
include 'classes/DB.php';


