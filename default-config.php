<?php
/*
 * Language configuration
 *  The available language configurations are create_swedish, create_english and 
 *  create_german. Sorry for the poor german translation :P
 */
$config = BarTabConfiguration::create_english();

/*
 * Default user configuration
 *  By setting the $base_user's admin status to TRUE you enable yourself to configure the
 *  system using the build in admin functions. It is recommended to setup an administrator
 *  user as soon as possible.
 */
$base_user = new BarUser(0, 'anonymous', 'Anonymous', '', '', '', '', FALSE, FALSE);
$config->user = $base_user;

/*
 * Database configuration
 */
$config->db_host = 'localhost';
$config->db_name = 'bartab';
$config->db_user = 'db_user';
$config->db_password = 'db_password';
$config->db_port = 3306;

/*
 * URL configuration
 *  The base_url and the data_url should be the same unless you have trouble getting
 *  url rerouting to work using the .htaccess file. If the rerouting does not work then 
 *  you should append 'index.php/' to your base_url.
 */
$config->data_url = 'http://yoursite.url/';
$config->base_url = 'http://yoursite.url/';
?>