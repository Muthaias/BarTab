<?php
require_once('bartablanguage.php');

class BarTabConfiguration
{
	// User
	public $user;
	public $max_debt = -2000;
	
	// Data paths
	public $data_url = '';
	public $base_url = '';
	
	public function get_data_url($sub)
	{return $this->data_url . $sub;}
	
	public function get_base_url($sub)
	{return $this->base_url . $sub;}
	
	// Database config
	public $db_host;
	public $db_name;
	public $db_user;
	public $db_password;
	public $db_port;
	public $db_table_prefix = '';
	
	// Page config
	public $enable_item_list = TRUE;
	public $enable_user_list = TRUE;
	public $enable_user_view = TRUE;
	public $enable_user_edit = TRUE;
	public $enable_item_edit = TRUE;
	public $enable_purchase = TRUE;
	public $enable_user_transactions = TRUE;
	
	public $lang;
	
	public function __construct()
	{
		 $lang = BarTabLanguage::create_english();
	}
};
?>