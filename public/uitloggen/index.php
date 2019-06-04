<?php

include '../../boot.php'; // load all functions

Auth::logout();

Http::redirect('');
