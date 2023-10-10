<?php
session_start();

include $_SERVER['PWD'] . '/app/vendor/autoload.php';

use App\Test\Controller\Logout;

session_destroy();

$logout = new Logout;
$logout->execute();
