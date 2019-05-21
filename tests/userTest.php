<?php

include '../classes/User.php';

$user = new User;

var_dump($user->convert('Matthijs', '', 'Openneer', 'Fraijlemaborg'));
