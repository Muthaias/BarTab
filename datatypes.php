<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <me@cp0la.se> wrote this file.  As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return.   Mattias Nyberg
 * ----------------------------------------------------------------------------
 */

class BarUser
{
	public $id;
	public $name;
	public $username;
	public $real_name;
	public $email;
	public $hash;
	public $salt;
	public $disabled;
	public $account;
	public $admin;
	
	function __construct($id, $name, $real_name, $email, $account, $hash, $salt, $admin, $disabled)
	{
		$this->id = $id;
		$this->username = htmlspecialchars(($name));
		$this->real_name = htmlspecialchars(($real_name));
		$this->name = $this->real_name;
		$this->email = htmlspecialchars(($email));
		$this->hash = $hash;
		$this->salt = $salt;
		$this->disabled = $disabled;
		$this->account = $account;
		$this->admin = $admin;
	}
};

class BarItem
{
	public $id;
	public $name;
	public $description;
	public $price;
	public $disabled;
	
	function __construct($id, $name, $description, $price, $disabled)
	{
		$this->id = $id;
		$this->name = htmlspecialchars(($name));
		$this->description = htmlspecialchars(($description));
		$this->price = $price;
		$this->disabled = $disabled;
	}
};

class BarTransaction
{
	public $user_id;
	public $value;
};

class BarPurchase
{
	public $user_id;
	public $item_id;
};

class BarItemCount
{
	public $item;
	public $count;
	
	function __construct($item, $count)
	{	
		$this->item = $item;
		$this->count = $count;
	}
};

class BarMessage
{
	public $type = 'alert-info';
	public $text = '';
	public $title = 'Info';
	
	function __construct($type, $title, $text)
	{
		$this->type = $type;
		$this->title = $title;
		$this->text = $text;
	}
	
	public static function create_error($error)
	{
		return new BarMessage('alert-warning', 'Error', $error);
	}
	
	public static function create_info($info)
	{
		return new BarMessage('alert-info', 'Info', $info);
	}
	
	public static function create_success($success)
	{
		return new BarMessage('alert-success', 'Success', $success);
	}
}
?>