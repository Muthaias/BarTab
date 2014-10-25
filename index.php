<?php
error_reporting(E_ALL);

require_once('bartabapplication.php');
require_once('bardataconnectors.php');

session_start();

require('config.php');

$bartab = new BarTabApplication($config);
$bartab->run();
?>