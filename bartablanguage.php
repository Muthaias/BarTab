<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <me@cp0la.se> wrote this file.  As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return.   Mattias Nyberg
 * ----------------------------------------------------------------------------
 */


class BarTabLanguage
{
	// Site config
	public $purchase_string;
	public $currency_string;
	public $username_string;
	public $user_purchases_string;
	public $name_string;
	public $disabled_string;
	public $price_string;
	public $password_string;
	public $submit_string;
	public $email_string;
	public $account_string;
	public $admin_string;
	public $user_string;
	public $update_user_string;
	public $update_item_string;
	public $info_string;
	public $real_name_string;
	public $description_string;
	public $add_new_item_string;
	public $add_new_user_string;
	public $users_string;
	public $items_string;
	public $signin_string;
	public $signout_string;
	public $transaction_string;
	public $amount_string;
	
	// Messages
	public $username_error_string;
	public $email_error_string;
	public $password_error_string;
	public $add_user_error_string;
	public $max_debt_error_string;
	public $purchase_auth_error_string;
	public $item_nexist_error_string;
	public $add_user_success_string;
	public $purchase_success_string;
	public $update_user_success_string;
	public $update_user_error_string;
	public $remove_user_success_string;
	public $remove_user_error_string;
	public $invalid_user_id_string;
	
	public $remove_item_success_string;
	public $remove_item_error_string;
	public $invalid_item_id_string;
	public $update_item_success_string;
	public $update_item_error_string;
	public $add_item_success_string;
	public $add_item_error_string;
	
	public $signin_success_string;
	public $signin_error_string;
	public $signout_success_string;
	public $signout_error_string;
	public $zero_value_transaction_error_string;
	public $transaction_success_string;
	public $transaction_error_string;
	
	// Title setup
	public $title;
	public $item_list_title;
	public $user_list_title;
	public $update_user_title;
	public $update_item_title;
	public $user_view_title;
	
	public function __construct()
	{
		$this->set_english();
	}
	
	public function set_english()
	{
		$this->purchase_string = 'Buy for';
		$this->currency_string = 'B';
		$this->username_string = 'User name';
		$this->user_purchases_string = 'User purchases';
		$this->name_string = 'Name';
		$this->disabled_string = 'Disabled';
		$this->price_string = 'Price';
		$this->password_string = 'Password';
		$this->submit_string = 'Send';
		$this->email_string = 'E-mail';
		$this->account_string = 'Account balance';
		$this->admin_string = 'Admin';
		$this->user_string = 'User';
		$this->update_user_string = 'Update user';
		$this->update_item_string = 'Update item';
		$this->info_string = 'Information';
		$this->real_name_string = 'Real name';
		$this->description_string = 'Description';
		$this->add_new_item_string = 'Add new item';
		$this->add_new_user_string = 'Add new user';
		$this->users_string = 'Users';
		$this->items_string = 'Items';
		$this->signin_string = 'Sign in';
		$this->signout_string = 'Sign out';
		$this->transaction_string = 'Transaction';
		$this->amount_string = 'Amount';
		
		// Title setup
		$this->title = 'Bar tab';
		$this->item_list_title = 'Price list';
		$this->user_list_title = 'User list';
		$this->update_user_title = 'Update user';
		$this->update_item_title = 'Update item';
		$this->user_view_title = 'Show user';
		
		// Messages
		$this->username_error_string = 'User name was not set.';
		$this->email_error_string = 'Email was not set.';
		$this->password_error_string = 'Password was not set.';
		$this->add_user_error_string = 'Unable to add new user.';
		$this->max_debt_error_string = 'Could not purchase item. Max debt %d reached for account.';
		$this->purchase_auth_error_string = 'Could not purchase item. No authorized user logged in.';
		$this->item_nexist_error_string = 'Item with id %d does not exist.';
		$this->add_user_success_string = 'Successfully added user: %s';
		$this->purchase_success_string = 'Purchased item with id %d.';
		$this->update_user_success_string = 'Successfully updated user %s.';
		$this->update_user_error_string = 'Failed to update user %s.';
		$this->remove_user_success_string = 'Successfully removed user %s.';
		$this->remove_user_error_string = 'Failed to remove user %s.';
		$this->invalid_user_id_string = 'Invalid user id %d.';
		
		$this->remove_item_success_string = 'Successfully removed item %d.';
		$this->remove_item_error_string = 'Failed to remove item %d.';
		$this->invalid_item_id_string = 'Invalid item id %d.';
		$this->update_item_success_string = 'Successfully updated item %d.';
		$this->update_item_error_string = 'Failed to update item %d.';
		$this->add_item_success_string = 'Successfully added item %d.';
		$this->add_item_error_string = 'Failed to add item.';
		
		$this->signin_success_string = 'Sign in was successful. Welcome, %s.';
		$this->signin_error_string = 'Invalid username or password.';
		$this->signout_success_string = 'Successfully signed out user %s.';
		$this->signout_error_string = 'No user to sign out.';
		$this->zero_value_transaction_error_string = 'Can not make transaction of value zero.';
		$this->transaction_success_string = 'Transaction of amount %d %s succeded.';
		$this->transaction_error_string = 'Transaction failed.';
	}

	public function set_from_data($data)
	{
		$this->purchase_string = $data["purchase_string"];
		$this->currency_string = $data["currency_string"];
		$this->username_string = $data["username_string"];
		$this->user_purchases_string = $data["user_purchases_string"];
		$this->name_string = $data["name_string"];
		$this->disabled_string = $data["disabled_string"];
		$this->price_string = $data["price_string"];
		$this->password_string = $data["password_string"];
		$this->submit_string = $data["submit_string"];
		$this->email_string = $data["email_string"];
		$this->account_string = $data["account_string"];
		$this->admin_string = $data["admin_string"];
		$this->user_string = $data["user_string"];
		$this->update_user_string = $data["update_user_string"];
		$this->update_item_string = $data["update_item_string"];
		$this->info_string = $data["info_string"];
		$this->real_name_string = $data["real_name_string"];
		$this->description_string = $data["description_string"];
		$this->add_new_item_string = $data["add_new_item_string"];
		$this->add_new_user_string = $data["add_new_user_string"];
		$this->users_string = $data["users_string"];
		$this->items_string = $data["items_string"];
		$this->signin_string = $data["signin_string"];
		$this->signout_string = $data["signout_string"];
		$this->transaction_string = $data["transaction_string"];
		$this->amount_string = $data["amount_string"];

		// Title setup
		$this->title = $data["title"];
		$this->item_list_title = $data["item_list_title"];
		$this->user_list_title = $data["user_list_title"];
		$this->update_user_title = $data["update_user_title"];
		$this->update_item_title = $data["update_item_title"];
		$this->user_view_title = $data["user_view_title"];

		// Messages
		$this->username_error_string = $data["username_error_string"];
		$this->email_error_string = $data["email_error_string"];
		$this->password_error_string = $data["password_error_string"];
		$this->add_user_error_string = $data["add_user_error_string"];
		$this->max_debt_error_string = $data["max_debt_error_string"];
		$this->purchase_auth_error_string = $data["purchase_auth_error_string"];
		$this->item_nexist_error_string = $data["item_nexist_error_string"];
		$this->add_user_success_string = $data["add_user_success_string"];
		$this->purchase_success_string = $data["purchase_success_string"];
		$this->update_user_success_string = $data["update_user_success_string"];
		$this->update_user_error_string = $data["update_user_error_string"];
		$this->remove_user_success_string = $data["remove_user_success_string"];
		$this->remove_user_error_string = $data["remove_user_error_string"];
		$this->invalid_user_id_string = $data["invalid_user_id_string"];

		$this->remove_item_success_string = $data["remove_item_success_string"];
		$this->remove_item_error_string = $data["remove_item_error_string"];
		$this->invalid_item_id_string = $data["invalid_item_id_string"];
		$this->update_item_success_string = $data["update_item_success_string"];
		$this->update_item_error_string = $data["update_item_error_string"];
		$this->add_item_success_string = $data["add_item_success_string"];
		$this->add_item_error_string = $data["add_item_error_string"];

		$this->signin_success_string = $data["signin_success_string"];
		$this->signin_error_string = $data["signin_error_string"];
		$this->signout_success_string = $data["signout_success_string"];
		$this->signout_error_string = $data["signout_error_string"];
		$this->zero_value_transaction_error_string = $data["zero_value_transaction_error_string"];
		$this->transaction_success_string = $data["transaction_success_string"];
		$this->transaction_error_string = $data["transaction_error_string"];
	}

	public static function create_english()
	{
		$lang = new BarTabLanguage();
		$lang->set_english();
		return $lang;
	}

	public static function load_language($path)
	{
		$contents = file_get_contents($path);
		$lang = new BarTabLanguage();
		if ($contents !== FALSE)
		{
			$data = json_decode($contents);
			if ($data)
			{
				$lang->set_from_data((array)$data);
			}
		}

		return $lang;
	}
};
?>
