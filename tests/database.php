<?php

/**
 * Connectie maken met een database en een query draaien
 * Op de meest simpele manier
 */

$dbhost = 'localhost';
$dbname = 'webshop8b';
$dbuser = 'root';
$dbpass = 'root';

try {
    $conn = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo 'Joepie!';
}
catch(PDOException $e) {
    echo 'Whoops, foutje';
}

/**
 * Query draaien
 */

$query = 'SELECT * FROM users';

$users = $conn->prepare($query);

try {
    $users->execute([]);
    $users->setFetchMode(PDO::FETCH_ASSOC);
    $users = $users->fetchAll();

    // var_dump($users);
}
catch(PDOException $e) {
    echo 'Whoops, query mislukt';
}

echo $users[0]['first_name'];


/**
 * Query nummer 2
 */

$query = 'SELECT * FROM users WHERE id = :id';

$user = $conn->prepare($query);

try {
    $user->execute([
        'id' => 1
    ]);
    $user->setFetchMode(PDO::FETCH_ASSOC);
    $user = $user->fetch();

    // var_dump($user);
}
catch(PDOException $e) {
    echo 'Whoops, query mislukt';
}


// echo $user['first_name'].' '.$user['last_name'];
