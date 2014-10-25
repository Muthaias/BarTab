<?php
require_once('Slim/Slim.php');
require_once('datatypes.php');
require_once('bartabconfiguration.php');

class BarTabApplication
{
	function __construct($config)
	{
		/* 
		 * Make sure config can be accepted
		 */
		if(!is_a($config, 'BarTabConfiguration'))
		{
			throw new Exception('Configuration is not of BarTabConfiguration type.');
		}
		
		/* 
		 * Make sure user is valid
		 */
		if(!is_a($config->user, 'BarUser'))
		{
			throw new Exception('User must be of BarUser type.');
		}
	
		/* 
		 * Setup Slim Framework
		 */
		\Slim\Slim::registerAutoloader();
		$this->app = new \Slim\Slim();
		$this->app->config(array(
			'debug' => true,
			'templates.path' => 'tpl'
		));
	
		/*
		 * Setup database connection
		 */
		$this->dbh = null;
		try
		{
			$this->dbh = new PDO('mysql:host=' .$config->db_host. ';port=' 
								.$config->db_port. ';dbname=' .$config->db_name, 
								$config->db_user, $config->db_password);
			//$this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		}
		catch(PDOException $e)
		{
			$this->add_message(BarMessage::create_error($e->getMessage()));
		}
		
		$this->user_connector = new BarUserConnector($this->dbh, $config->db_table_prefix);
		$this->transaction_connector = new BarTransactionConnector($this->dbh, $config->db_table_prefix);
		$this->item_connector = new BarItemConnector($this->dbh, $config->db_table_prefix);
			
		/*
		 * Store configuration
		 */
		$this->config = $config;
		
		$user = $this->get_user($this->get_user_id());
		if($user != FALSE && $user->disabled != TRUE)
			$this->config->user = $user;
		else
			$this->unset_user_id();
		
		if($config->enable_item_list) $this->setup_item_list();
		if($config->enable_item_edit) $this->setup_item_edit();
		if($config->enable_user_list) $this->setup_user_list();
		if($config->enable_user_edit) $this->setup_user_edit();
		if($config->enable_user_view) $this->setup_user_view();
		if($config->enable_purchase) $this->setup_purchase();
		if($config->enable_user_transactions) $this->setup_user_transaction();
		$this->setup_signin();
		$this->setup_signout();
		
		$self = $this;
		$this->app->get(
			'/',
			function () use($self)
			{
				$self->app->redirect('itemlist');
			}
		);
		
		$this->app->get(
			'/setup',
			function () use($self)
			{
				if($self->setup_db())
				{
					$self->add_success('Database setup successful.');
				}
				else
				{
					$self->add_error('Failed to setup database');
				}
				$self->setup_header('admin');
				$self->setup_footer();
			}
		);
	}
	
	/*
	 * System functions for session and user management
	 */
	public function set_user_id($id)
	{$_SESSION['user_id'] = $id;}
	
	public function get_user_id()
	{
		if(isset($_SESSION['user_id']))
			return $_SESSION['user_id'];
		return 0;
	}
	public function unset_user_id()
	{
		unset($_SESSION['user_id']);
	}
	
	public function add_message($message)
	{
		if(!isset($_SESSION['messages']))
			$_SESSION['messages'] = array();
			
		array_push($_SESSION['messages'], $message);
	}
	
	public function add_error($message)
	{$this->add_message(BarMessage::create_error($message));}
	
	public function add_info($message)
	{$this->add_message(BarMessage::create_info($message));}
	
	public function add_success($message)
	{$this->add_message(BarMessage::create_success($message));}
	
	public function get_messages()
	{
		if(!isset($_SESSION['messages']))
			return array();
		
		$messages = $_SESSION['messages'];
		unset($_SESSION['messages']);
		return $messages;
	}
	
	public function password_hash($password, $salt=NULL)
	{
		if($salt == NULL)
			$salt = mcrypt_create_iv(32);
		return array('hash'=>md5($password . $salt), 'salt'=>$salt);
	}
	
	public function setup_db()
	{
		if($this->dbh == NULL)
		{
			$this->add_error('Unable to connect to db.');
			return FALSE;
		}
	
		$stmt = $this->dbh->prepare('CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) UNIQUE,
	real_name VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin,
	email VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin,
	hash VARCHAR(2047) CHARACTER SET utf8 COLLATE utf8_bin,
	salt VARCHAR(2047) CHARACTER SET utf8 COLLATE utf8_bin,
	admin BOOLEAN,
	disabled BOOLEAN NOT NULL
);

CREATE TABLE item (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin,
	description VARCHAR(1023) CHARACTER SET utf8 COLLATE utf8_bin,
	price INT NOT NULL,
	disabled BOOLEAN NOT NULL
);

CREATE TABLE transaction (
	user_id INT NOT NULL,
	value INT NOT NULL
);

CREATE TABLE purchase (
	user_id INT NOT NULL,
	item_id INT NOT NULL
);');
		$result = $stmt->execute();
		if($result)
		{
			$stmt->closeCursor();
			return $this->add_user('admin', 'Super Sexy Admin Guy', '', 'password', TRUE, FALSE);
		}
		return FALSE;
	}
	
	public function add_user($name, $real_name, $email, $password, $admin = FALSE, $disabled = FALSE)
	{
		$pwd = $this->password_hash($password);
		return $this->user_connector->add_user($name, $real_name, $email, $pwd['hash'], $pwd['salt'], $admin, $disabled);
	}
	
	public function get_user($user_id)
	{
		$user = $this->config->user;
		try
		{
			$tmp_user = $this->user_connector->get_user($user_id);
			if($tmp_user != FALSE)
				$user = $tmp_user;
		}
		catch(Exception $e)
		{
			$this->add_error($e->getMessage());
		}
		return $user;
	}
	
	public function get_user_by_name($user_name)
	{
		$user = FALSE;
		try
		{
			$user = $this->user_connector->get_user_by_name($user_name);
		}
		catch(Exception $e)
		{
			$this->add_error($e->getMessage());
		}
		return $user;
	}
	
	public function get_user_purchases($user_id)
	{
		$list = array();
		try
		{
			$list = $this->transaction_connector->list_purchases($user_id);
		}
		catch(Exception $e)
		{
			$this->add_error($e->getMessage());
		}
		return $list;
	}
	
	public function get_item_list()
	{
		$item_list = array();
		try
		{
			$item_list = $this->item_connector->get_item_list();
		}
		catch(Exception $e)
		{
			$this->add_error($e->getMessage());
		}
		return $item_list;
	}
	
	public function get_user_list()
	{
		$user_list = array();
		try
		{
			$user_list = $this->user_connector->get_user_list();
		}
		catch(Exception $e)
		{
			$this->add_error($e->getMessage());
		}
		return $user_list;
	}

	public function setup_header($active_nav = NULL)
	{
		if($active_nav != NULL)
		{
			$this->app->render('header.php', array('conf'=>$this->config, 
											'lang'=>$this->config->lang,
											'nav'=>array($active_nav=>'active')));
		}
		else
		{
			$this->app->render('header.php', array('conf'=>$this->config));
		}
			
		$messages = $this->get_messages();
		$this->app->render('messages.php', array('messages'=>$messages));
	}
	
	public function setup_footer()
	{
		$this->app->render('footer.php', array('conf'=>$this->config, 
												'lang'=>$this->config->lang));
	}
	
	/*
	 * Page setups
	 */
	
	protected function setup_signin()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		
		$app->get(
			'/admin/signin',
			function () use ($app, $config, $self)
			{
				$self->setup_header('admin');
				$app->render('signinform.php');
				$self->setup_footer();
			}
		);
		
		$app->post(
			'/admin/signin',
			function () use ($app, $config, $self)
			{
				$username = $app->request->post('username');
				$password = $app->request->post('password');
				
				$success = FALSE;
				if($username != NULL && $password != NULL && ($user = $self->get_user_by_name($username)))
				{
					$hash = $self->password_hash($password, $user->salt);
					
					if($user->disabled == FALSE && strcmp($hash['hash'], $user->hash) == 0)
					{
						$self->add_success(sprintf($config->lang->signin_success_string, $user->name));
						$self->set_user_id($user->id);
						$success = TRUE;
					}
					else
					{
						$self->add_error($config->lang->signin_error_string);
					}
				}
				else
				{
					$self->add_error($config->lang->signin_error_string);
				}
				
				if($success)
					$app->redirect('../itemlist');
				else
					$app->redirect('signin');
			}
		);
	}
	
	protected function setup_signout()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		$user = $this->config->user;
		
		$app->get(
			'/admin/signout',
			function () use ($app, $config, $self, $user)
			{
				if($user->id != NULL)
				{
					$self->unset_user_id();
					$self->add_success(sprintf($config->lang->signout_success_string, $user->name));
				}
				else
					$self->add_error($config->lang->signout_error_string);
				$app->redirect('../itemlist');
			}
		);
	}
	
	protected function setup_item_list()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		
		$app->get(
			'/itemlist',
			function () use ($app, $config, $self)
			{
				$self->setup_header('itemlist');
				$item_list = $self->get_item_list();
				$app->render('itemlist.php', array('list'=>$item_list, 
												'lang'=>$config->lang));
				$self->setup_footer();
			}
		);
	}
	
	protected function setup_item_edit()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		$user = $this->config->user;
		
		$app->get(
			'/admin/items',
			function () use ($app, $config, $user)
			{
				if(!$user->admin) $app->redirect('signin');
				
				$id = 0;
				$app->redirect('item/' . $id);
			}
		);
		
		$app->get(
			'/admin/item/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../signin');
			
				$item_list = $self->get_item_list();
				if($id != 0)
					$item = $self->item_connector->get_item($id);
				else
					$item = new BarItem(0, '', '', 0, FALSE);
				$self->setup_header('admin');
				$app->render('itemedit.php', array('item'=>$item));
				$app->render('itemeditlist.php', array('item_type'=>'glass',
												'item_list_title_string'=>$config->lang->item_list_title,
												'new_item_string'=>$config->lang->add_new_item_string,
												'list'=>$item_list, 'item'=>$item));
				$self->setup_footer();
			}
		);
		
		$app->get(
			'/admin/item/remove/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../../signin');
			
				if($id > 0)
				{
					if($self->item_connector->update_item($id, NULL, NULL, NULL, TRUE))
						$self->add_success(sprintf($config->lang->remove_item_success_string, $id));
					else
						$self->add_error(sprintf($config->lang->remove_item_error_string, $id));
				}
				else
				{
					$self->add_error(sprintf($config->lang->invalid_item_id_string, $id));
				}
					
				$app->redirect('../0');
			}
		);
		
		$app->post(
			'/admin/item/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../signin');
				
				$name = $app->request->post('name');
				$price = $app->request->post('price');
				$description = $app->request->post('description');
				
				$disabled = $app->request->post('disabled');
				$disabled = ($disabled == NULL) ? FALSE : TRUE;
				
				$admin = $app->request->post('admin');
				$admin = ($admin == NULL) ? FALSE : TRUE;
				
				if($id == 0 && $name == NULL)
					$self->add_error('Item needs a name.');
				if($id == 0 && $price == NULL)
					$self->add_error('Item needs a price.');
					
				if($id != 0)
				{
					if($self->item_connector->update_item($id, $name, $price, $description, $disabled))
						$self->add_success(sprintf($config->lang->update_item_success_string, $id));
					else
						$self->add_error(sprintf($config->lang->update_item_error_string, $id));
				}
				else if($id == 0 && $name != NULL && $price != NULL)
				{
					if(($id = $self->item_connector->add_item($name, $price, $description, $disabled)))
						$self->add_success(sprintf($config->lang->add_item_success_string, $id));
					else
					{
						$self->add_error($config->lang->add_item_error_string);
						$id = 0;
					}
				}
				$app->redirect('' . $id);
			}
		);
	}
	
	protected function setup_user_list()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		
		$app->get(
			'/userlist',
			function () use ($app, $config, $self)
			{
				$self->setup_header('userlist');
				$user_list = $self->get_user_list();
				$app->render('userlist.php', array('list'=>$user_list));
				$self->setup_footer();
			}
		);
	}
	
	protected function setup_user_edit()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		$user = $this->config->user;
		
		$app->get(
			'/admin/users',
			function () use ($app, $config, $user)
			{
				if(!$user->admin) $app->redirect('signin');
				
				$id = 0;
				$app->redirect('user/' . $id);
			}
		);
		
		$app->get(
			'/admin/user/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../signin');
			
				$cur_user = $self->get_user($id);
				$cur_user = !$cur_user ? new BarUser(0, NULL, NULL, NULL, NULL, NULL, NULL, FALSE, FALSE):$cur_user;
				$self->setup_header('admin');
				$user_list = $self->get_user_list();
				$app->render('useredit.php', array('user'=>$cur_user));
				$app->render('itemeditlist.php', array('item_type'=>'user',
												'item_list_title_string'=>$config->lang->user_list_title,
												'new_item_string'=>$config->lang->add_new_user_string,
												'list'=>$user_list, 'item'=>$cur_user));
				$self->setup_footer();
			}
		);
		
		$app->get(
			'/admin/user/remove/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../../signin');
			
				$cur_user = $self->user_connector->get_user($id);
				if($id > 0 && $cur_user)
				{
					if($self->user_connector->update_user($id, NULL, NULL, NULL, NULL, NULL, NULL, TRUE))
						$self->add_success(sprintf($config->lang->remove_user_success_string, $cur_user->name));
					else
						$self->add_error(sprintf($config->lang->remove_user_error_string, $cur_user->name));
				}
				else
				{
					$self->add_error(sprintf($config->lang->invalid_user_id_string, $id));
				}
					
				$app->redirect('../0');
			}
		);
		
		$app->post(
			'/admin/user/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../signin');
			
				$name = $app->request->post('name');
				$real_name = $app->request->post('real_name');
				$email = $app->request->post('email');
				$password = $app->request->post('password');
				
				$disabled = $app->request->post('disabled');
				$disabled = ($disabled == NULL) ? FALSE : TRUE;
				
				$admin = $app->request->post('admin');
				$admin = ($admin == NULL) ? FALSE : TRUE;
				
				if($id == 0 && $name == NULL)
					$self->add_error($config->lang->username_error_string);
				if($id == 0 && $email == NULL)
					$self->add_error($config->lang->email_error_string);
				if($id == 0 && $password == NULL)
					$self->add_error($config->lang->password_error_string);
					
				if($id == 0 && $name != NULL && $email != NULL && $password != NULL)
				{
					if($self->add_user($name, $real_name, $email, $password, $admin, $disabled))
						$self->add_success(sprintf($config->lang->add_user_success_string, $name));
					else
						$self->add_error($config->lang->add_user_error_string);
				}
				else if($id != 0)
				{
					$hash = array('hash'=>NULL, 'salt'=>NULL);
					if($password != NULL)
						$hash = $self->password_hash($password);
					if($self->user_connector->update_user($id, $name, $real_name, $email, $hash['hash'], $hash['salt'], $admin, $disabled))
						$self->add_success(sprintf($config->lang->update_user_success_string, $name));
					else
						$self->add_error(sprintf($config->lang->update_user_error_string, $name));
				}
				$app->redirect(''.$id);
			}
		);
	}
	
	protected function setup_user_view()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		$user = $this->config->user;
		
		$app->get(
			'/userview',
			function () use ($app, $config, $user, $self)
			{
				$self->setup_header('userview');
				$purchases = $self->get_user_purchases($user->id);
				$app->render('userview.php', array('user'=>$user, 'purchases'=>$purchases));
				$self->setup_footer();
			}
		);
	}
	
	protected function setup_user_transaction()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		$user = $this->config->user;
		
		$app->get(
			'/admin/transactions',
			function () use ($app, $config, $user, $self)
			{
				if($user->admin)
					$app->redirect('transactions/'.$user->id);
				else
					$app->redirect('signin');
			}
		);
		
		$app->get(
			'/admin/transactions/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../signin');
				
				if($id == 0 && $user->id != 0) $app->redirect('./' . $user->id);
			
				$self->setup_header('admin');
				$user_list = $self->get_user_list();
				$cur_user = $self->get_user($id);
				$cur_user = !$cur_user ? new BarUser(0, NULL, NULL, NULL, NULL, NULL, NULL, FALSE, FALSE):$cur_user;
				$purchases = $self->get_user_purchases($id);
				$app->render('userview.php', array('user'=>$cur_user, 'purchases'=>$purchases));
				$app->render('usertransaction.php', array('user'=>$cur_user));
				$app->render('itemviewlist.php', array('item_type'=>'user',
												'item_list_title_string'=>$config->lang->user_list_title,
												'new_item_string'=>$config->lang->add_new_user_string,
												'list'=>$user_list, 'item'=>$cur_user,
												'has_create_item'=>FALSE));
				$self->setup_footer();
			}
		);
		
		$app->post(
			'/admin/transactions/:id',
			function ($id) use ($app, $config, $user, $self)
			{
				if(!$user->admin) $app->redirect('../signin');
			
				/* TODO: Might be a good idea to verify that the amount is not less than
				 *       zero but it depends on what one wants to allow in the system.
				 *       A configuration parameter might be a good idea.
				 */
				$amount = $app->request->post('amount');
				
				if($amount != NULL && intval($amount) != 0 && $id != 0)
				{
					if($self->transaction_connector->make_transaction($id, intval($amount)))
						$self->add_success(sprintf($config->lang->transaction_success_string, intval($amount), $config->lang->currency_string));
					else
						$self->add_error($config->lang->transaction_error_string);
				}
				else if(intval($amount) == 0)
				{
					$self->add_error($config->lang->zero_value_transaction_error_string);
				}
				else
				{
					$self->add_error($config->lang->transaction_error_string);
				}
				
				$app->redirect(''.$id);
			}
		);
	}
	
	protected function setup_purchase()
	{
		$app = $this->app;
		$config = $this->config;
		$self = $this;
		$user = $this->config->user;
		
		$app->get(
			'/purchase/:item',
			function ($item) use ($app, $config, $user, $self)
			{
				if($user->id != 0)
				{
					if($user->account > $config->max_debt)
					{
						if($self->transaction_connector->make_purchase($user->id, $item))
							$self->add_success(sprintf($config->lang->purchase_success_string, $item));
						else
							$self->add_error(sprintf($config->lang->item_nexist_error_string, $item));
					}
					else
						$self->add_error(sprintf($config->lang->max_debt_error_string, $config->max_debt));
				}
				else
				{
					$self->add_error($config->lang->purchase_auth_error_string);
				}
				
				$app->redirect('../itemlist');
			}
		);
	}
	
	public function run()
	{
		$this->app->run();
	}
};
?>