<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <me@cp0la.se> wrote this file.  As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return.   Mattias Nyberg
 * ----------------------------------------------------------------------------
 */
 
require_once('bartabapplication.php');
require_once('bardataconnectors.php');

session_start();

require('config.php');

$bartab = new BarTabApplication($config);
$bartab->run();
?>