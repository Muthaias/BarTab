<?php
require_once('dataconnector.php');
require_once('datatypes.php');

class BarTransactionConnector extends DataConnector
{
	function __construct($dbh, $table_prefix = '')
	{
		parent::__construct($dbh, $table_prefix . 'transaction');
		$this->purchase_table_name = $table_prefix . 'purchase';
		$this->item_table_name = $table_prefix . 'item';
	}

	public function sum_account($user_id)
	{
		if(!$this->connected_or_error()) return FALSE;
		
		$stmt = $this->dbh->prepare('SELECT SUM(value) AS account FROM ' .$this->table_name. ' WHERE user_id=:user_id;');
		$result = $stmt->execute(array('user_id'=>$user_id));
		$account = 0;
		if($result)
		{
			$acc = $stmt->fetch();
			
			if($acc['account'] != null)
				$account = $acc['account'];
		}
		$stmt->closeCursor();
		return $account;
	}
	
	public function list_purchases($user_id)
	{
		if(!$this->connected_or_error()) return FALSE;
		
		$stmt = $this->dbh->prepare('SELECT a.name, a.id, b.item_count FROM ' .$this->item_table_name. 
				' a JOIN(SELECT DISTINCT item_id, count(*) AS item_count FROM ' .$this->purchase_table_name. 
				' WHERE user_id=:user_id GROUP BY item_id) b ON a.id = b.item_id');
		$result = $stmt->execute(array('user_id'=>$user_id));
		$data_list = array();
		if($result)
		{
			$data = $stmt->fetchAll();
			$stmt->closeCursor();

			foreach($data as $d)
			{
				array_push($data_list, new BarItemCount(new BarItem($d['id'], $d['name'], '', 0, FALSE), $d['item_count']));
			}
		}
		return $data_list;
	}
	
	public function make_purchase($user_id, $item_id)
	{
		if(!$this->connected_or_error()) return FALSE;
		
		$stmt = $this->dbh->prepare('INSERT INTO ' .$this->table_name. 
			' VALUES(:user_id, -(SELECT price FROM ' .$this->item_table_name. 
			' WHERE id=:item_id)); INSERT INTO ' .$this->purchase_table_name. ' VALUES(:user_id, :item_id);');
		$result = $stmt->execute(array('user_id'=>$user_id, 'item_id'=>$item_id));
		if($result)
		{
			$stmt->closeCursor();
			return TRUE;
		}
		return FALSE;
	}
	
	public function make_transaction($user_id, $amount)
	{
		if(!$this->connected_or_error()) return FALSE;
		
		$stmt = $this->dbh->prepare('INSERT INTO ' .$this->table_name. ' VALUE(:user_id, :amount);');
		$result = $stmt->execute(array('user_id'=>$user_id, 'amount'=>$amount));
		if($result)
		{
			$stmt->closeCursor();
			return TRUE;
		}
		return FALSE;
	}
};

class BarItemConnector extends DataConnector
{
	function __construct($dbh, $table_prefix = '')
	{
		parent::__construct($dbh, $table_prefix . 'item');
	}

	function add_item($name, $price, $description, $disabled = FALSE)
	{
		if(!$this->connected_or_error()) return FALSE;
	
		$stmt = $this->dbh->prepare('INSERT INTO ' .$this->table_name. 
				' VALUES(NULL, :name, :description, :price, :disabled);');
		$result = $stmt->execute($this->item_data_array($name, $description, $price, $disabled));
		if($result)
		{
			$item_id = $this->dbh->lastInsertId();
			$stmt->closeCursor();
			
			return $item_id;
		}
		return FALSE;
	}
	
	function update_item($id, $name = NULL, $price = NULL, $description = NULL, $disabled = NULL)
	{
		return $this->selective_item_update($this->item_data_array($name, $description, $price, $disabled), $id);
	}
	
	function get_item($id)
	{
		$item = $this->get_complete_item($id);
		if($item)
		{
			return new BarItem($item['id'], $item['name'], $item['description'], 
								$item['price'], $item['disabled']);
		}
		return FALSE;
	}
	
	function get_item_list()
	{
		$il = $this->get_limited_list('*', 0, 0, FALSE);
		$item_list = array();
		if($il)
		{
			foreach($il as $item)
			{
				array_push($item_list, new BarItem($item['id'], $item['name'], 
							$item['description'], $item['price'], FALSE));
			}
		}
		return $item_list;
	}
	
	protected function item_data_array($name, $description, $price, $disabled)
	{
		$data = array();
		$data['name'] = $name;
		$data['description'] = $description;
		$data['price'] = $price;
		$data['disabled'] = $disabled;
		return $data;
	}
};

class BarUserConnector extends DataConnector
{
	function __construct($dbh, $table_prefix = '')
	{
		parent::__construct($dbh, $table_prefix . 'user');
		$this->transactions = new BarTransactionConnector($dbh, $table_prefix);
	}

	function add_user($name, $real_name, $email, $hash, $salt, $admin = FALSE, $disabled = FALSE)
	{
		if(!$this->connected_or_error()) return FALSE;
	
		$stmt = $this->dbh->prepare('INSERT INTO ' .$this->table_name. 
				' VALUES(NULL, :name, :real_name, :email, :hash, :salt, :admin, :disabled);');
		$result = $stmt->execute($this->user_data_array($name, $real_name, $email, $hash, $salt, 
					$admin, $disabled));
		if($result)
		{
			$user_id = $this->dbh->lastInsertId();
			$stmt->closeCursor();
			
			return $user_id;
		}
		return FALSE;
	}
	
	function get_user_by_name($name)
	{
		if(!$this->connected_or_error()) return FALSE;
	
		$stmt = $this->dbh->prepare('SELECT * FROM ' .$this->table_name. ' WHERE name=:name;');
		$result = $stmt->execute(array('name'=>$name));
		if($result)
		{
			$u = $stmt->fetch();
			$stmt->closeCursor();
			
			if($u['id'] == NULL)
				return FALSE;
			
			return new BarUser($u['id'], $u['name'], $u['real_name'], $u['email'], 0, $u['hash'], $u['salt'], $u['admin'], $u['disabled']);
		}
		return FALSE;
	}
	
	function get_user($id)
	{
		$u = $this->get_complete_item($id);
		if($u)
		{
			$account = $this->transactions->sum_account($id);
			return new BarUser($u['id'], $u['name'], $u['real_name'], $u['email'], $account, $u['hash'], $u['salt'], $u['admin'], $u['disabled']);
		}
		return FALSE;
	}
	
	function get_user_list()
	{
		$ul = $this->get_limited_list(array('id', 'name', 'real_name', 'email', 'admin'), 0, 0, FALSE);
		$user_list = array();
		if($ul)
		{
			foreach($ul as $u)
			{
				$account = $this->transactions->sum_account($u['id']);
				array_push($user_list, new BarUser($u['id'], $u['name'], $u['real_name'], $u['email'], $account, '', '', $u['admin'], FALSE));
			}
		}
		return $user_list;
	}
	
	function update_user($id, $name, $real_name, $email, $hash, $salt, $admin, $disabled = FALSE)
	{
		$data = $this->user_data_array($name, $real_name, $email, $hash, $salt, $admin, $disabled);
		$result = $this->selective_item_update($data, $id);
		return $result;
	}
	
	protected function user_data_array($name, $real_name, $email, $hash, $salt, $admin, $disabled)
	{
		$data = array();
		$data['name'] = $name;
		$data['real_name'] = $real_name;
		$data['email'] = $email;
		$data['hash'] = $hash;
		$data['salt'] = $salt;
		$data['admin'] = $admin;
		$data['disabled'] = $disabled;
		return $data;
	}
};
?>