<?php
class BarTabConfiguration
{
	// Site config
	public $purchase_string = 'Köp för';
	public $currency_string = 'B';
	public $username_string = 'Användarnamn';
	public $user_purchases_string = 'Användarköp';
	public $name_string = 'Namn';
	public $disabled_string = 'Avaktiverad';
	public $price_string = 'Pris';
	public $password_string = 'Lösenord';
	public $submit_string = 'Skicka';
	public $email_string = 'E-post';
	public $account_string = 'Saldo';
	public $admin_string = 'Admin';
	public $user_string = 'Användare';
	public $update_user_string = 'Justera användare';
	public $update_item_string = 'Justera objekt';
	public $info_string = 'Information';
	public $real_name_string = 'Fullt namn';
	public $description_string = 'Beskrivning';
	public $add_new_item_string = 'Lägg till nytt objekt';
	public $add_new_user_string = 'Lägg till ny användare';
	public $users_string = 'Användare';
	public $items_string = 'Objekt';
	public $signin_string = 'Logga in';
	public $signout_string = 'Logga ut';
	public $transaction_string = 'Överföring';
	public $amount_string = 'Belopp';
	
	// Messages
	public $username_error_string = 'User name was not set.';
	public $email_error_string = 'Email was not set.';
	public $password_error_string = 'Password was not set.';
	public $add_user_error_string = 'Unable to add new user.';
	public $max_debt_error_string = 'Could not purchase item. Max debt %d reached for account.';
	public $purchase_auth_error_string = 'Could not purchase item. No authorized user logged in.';
	public $item_nexist_error_string = 'Item with id %d does not exist.';
	public $add_user_success_string = 'Successfully added user: %s';
	public $purchase_success_string = 'Purchased item with id %d.';
	public $update_user_success_string = 'Successfully updated user %s.';
	public $update_user_error_string = 'Failed to update user %s.';
	public $remove_user_success_string = 'Tog bort användare %s.';
	public $remove_user_error_string = 'Kunde inte ta bort användare %s.';
	public $invalid_user_id_string = 'Ogiltigt användar-id %d.';
	
	public $remove_item_success_string = 'Successfully removed item %d.';
	public $remove_item_error_string = 'Failed to remove item %d.';
	public $invalid_item_id_string = 'Invalid item id %d.';
	public $update_item_success_string = 'Successfully updated item %d.';
	public $update_item_error_string = 'Failed to update item %d.';
	public $add_item_success_string = 'Successfully added item %d.';
	public $add_item_error_string = 'Failed to add item.';
	
	public $signin_success_string = 'Sign in was successful. Welcome, %s.';
	public $signin_error_string = 'Invalid username or password.';
	public $signout_success_string = 'Successfully signed out user %s.';
	public $signout_error_string = 'No user to sign out.';
	public $zero_value_transaction_error_string = 'Can not make transaction of value zero.';
	public $transaction_success_string = 'Transaction of amount %d %s succeded.';
	public $transaction_error_string = 'Transaction failed.';
	
	// User
	public $user;
	public $max_debt = -2000;
	
	// Title setup
	public $title = 'Bar tab';
	public $item_list_title = 'Prislista';
	public $user_list_title = 'Användarlista';
	public $update_user_title = 'Uppdatera användare';
	public $update_item_title = 'Uppdatera objekt';
	public $user_view_title = 'Visa användare';
	
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
	
	public static function create_swedish()
	{
		// Site config
		$conf = new BarTabConfiguration();
		$conf->purchase_string = 'Köp för';
		$conf->currency_string = 'B';
		$conf->username_string = 'Användarnamn';
		$conf->user_purchases_string = 'Användarköp';
		$conf->name_string = 'Namn';
		$conf->disabled_string = 'Avaktiverad';
		$conf->price_string = 'Pris';
		$conf->password_string = 'Lösenord';
		$conf->submit_string = 'Skicka';
		$conf->email_string = 'E-post';
		$conf->account_string = 'Saldo';
		$conf->admin_string = 'Admin';
		$conf->user_string = 'Användare';
		$conf->update_user_string = 'Justera användare';
		$conf->update_item_string = 'Justera objekt';
		$conf->info_string = 'Information';
		$conf->real_name_string = 'Fullt namn';
		$conf->description_string = 'Beskrivning';
		$conf->add_new_item_string = 'Lägg till nytt objekt';
		$conf->add_new_user_string = 'Lägg till ny användare';
		$conf->users_string = 'Användare';
		$conf->items_string = 'Objekt';
		$conf->signin_string = 'Logga in';
		$conf->signout_string = 'Logga ut';
		$conf->transaction_string = 'Överföring';
		$conf->amount_string = 'Belopp';
		
		// Title setup
		$conf->title = 'Skuldlistan';
		$conf->item_list_title = 'Prislista';
		$conf->user_list_title = 'Användarlista';
		$conf->update_user_title = 'Uppdatera användare';
		$conf->update_item_title = 'Uppdatera objekt';
		$conf->user_view_title = 'Visa användare';
		
		// Messages
		$conf->username_error_string = 'Användarnamn hade inget värde.';
		$conf->email_error_string = 'E-post krävs för alla användare.';
		$conf->password_error_string = 'Lösenordet var inte godkänt.';
		$conf->add_user_error_string = 'Kunde inte lägga till ny användare';
		$conf->max_debt_error_string = 'Kunde inte köpa objekt. Maximal skuld %d nådd på kontot.';
		$conf->purchase_auth_error_string = 'Kunde inte köpa objekt. Inget användare inloggad.';
		$conf->item_nexist_error_string = 'Objekt med id %d finns inte i listan.';
		$conf->add_user_success_string = 'Användare "%s" lades till.';
		$conf->purchase_success_string = 'Objekt med id %d köpt.';
		$conf->update_user_success_string = 'Updaterade användare %s.';
		$conf->update_user_error_string = 'Kunde inte uppdatera användare %s.';
		$conf->remove_user_success_string = 'Tog bort användare %s.';
		$conf->remove_user_error_string = 'Kunde inte ta bort användare %s.';
		$conf->invalid_user_id_string = 'Ogiltigt användar-id %d.';
		
		$conf->remove_item_success_string = 'Tog bort objekt %d.';
		$conf->remove_item_error_string = 'Kunde inte ta bort objekt %d.';
		$conf->invalid_item_id_string = 'Ogiltigt objekt-id %d.';
		$conf->update_item_success_string = 'Uppdaterade objekt %d.';
		$conf->update_item_error_string = 'Kunde inte uppdatera objekt %d.';
		$conf->add_item_success_string = 'Lade till objekt %d.';
		$conf->add_item_error_string = 'Kunde inte lägga till objekt.';
		
		$conf->signin_success_string = 'Inloggning lyckades. Välkommen, %s.';
		$conf->signin_error_string = 'Ogiltigt användarnamn eller lösenord.';
		$conf->signout_success_string = 'Utloggningen lyckades för användare %s.';
		$conf->signout_error_string = 'Ingen användare att logga ut.';
		$conf->zero_value_transaction_error_string = 'Kan inte göra överföring med värdet 0.';
		$conf->transaction_success_string = 'Överföring med värdet %d %s lyckades.';
		$conf->transaction_error_string = 'Överföringen misslyckades.';
		
		return $conf;
	}
	
	public static function create_english()
	{
		// Site config
		$conf = new BarTabConfiguration();
		$conf->purchase_string = 'Buy for';
		$conf->currency_string = 'B';
		$conf->username_string = 'User name';
		$conf->user_purchases_string = 'User purchases';
		$conf->name_string = 'Name';
		$conf->disabled_string = 'Disabled';
		$conf->price_string = 'Price';
		$conf->password_string = 'Password';
		$conf->submit_string = 'Send';
		$conf->email_string = 'E-mail';
		$conf->account_string = 'Account balance';
		$conf->admin_string = 'Admin';
		$conf->user_string = 'User';
		$conf->update_user_string = 'Update user';
		$conf->update_item_string = 'Update item';
		$conf->info_string = 'Information';
		$conf->real_name_string = 'Real name';
		$conf->description_string = 'Description';
		$conf->add_new_item_string = 'Add new item';
		$conf->add_new_user_string = 'Add new user';
		$conf->users_string = 'Users';
		$conf->items_string = 'Items';
		$conf->signin_string = 'Sign in';
		$conf->signout_string = 'Sign out';
		$conf->transaction_string = 'Transaction';
		$conf->amount_string = 'Amount';
		
		// Title setup
		$conf->title = 'Bar tab';
		$conf->item_list_title = 'Price list';
		$conf->user_list_title = 'User list';
		$conf->update_user_title = 'Update user';
		$conf->update_item_title = 'Update item';
		$conf->user_view_title = 'Show user';
		
		// Messages
		$conf->username_error_string = 'User name was not set.';
		$conf->email_error_string = 'Email was not set.';
		$conf->password_error_string = 'Password was not set.';
		$conf->add_user_error_string = 'Unable to add new user.';
		$conf->max_debt_error_string = 'Could not purchase item. Max debt %d reached for account.';
		$conf->purchase_auth_error_string = 'Could not purchase item. No authorized user logged in.';
		$conf->item_nexist_error_string = 'Item with id %d does not exist.';
		$conf->add_user_success_string = 'Successfully added user: %s';
		$conf->purchase_success_string = 'Purchased item with id %d.';
		$conf->update_user_success_string = 'Successfully updated user %s.';
		$conf->update_user_error_string = 'Failed to update user %s.';
		$conf->remove_user_success_string = 'Successfully removed user %s.';
		$conf->remove_user_error_string = 'Failed to remove user %s.';
		$conf->invalid_user_id_string = 'Invalid user id %d.';
		
		$conf->remove_item_success_string = 'Successfully removed item %d.';
		$conf->remove_item_error_string = 'Failed to remove item %d.';
		$conf->invalid_item_id_string = 'Invalid item id %d.';
		$conf->update_item_success_string = 'Successfully updated item %d.';
		$conf->update_item_error_string = 'Failed to update item %d.';
		$conf->add_item_success_string = 'Successfully added item %d.';
		$conf->add_item_error_string = 'Failed to add item.';
		
		$conf->signin_success_string = 'Sign in was successful. Welcome, %s.';
		$conf->signin_error_string = 'Invalid username or password.';
		$conf->signout_success_string = 'Successfully signed out user %s.';
		$conf->signout_error_string = 'No user to sign out.';
		$conf->zero_value_transaction_error_string = 'Can not make transaction of value zero.';
		$conf->transaction_success_string = 'Transaction of amount %d %s succeded.';
		$conf->transaction_error_string = 'Transaction failed.';
		
		return $conf;
	}
	
	public static function create_german()
	{
		// Site config
		$conf = new BarTabConfiguration();
		$conf->purchase_string = 'Kaufen für';
		$conf->currency_string = 'B';
		$conf->username_string = 'Benutzername';
		$conf->user_purchases_string = 'Benutzer einkäufe';
		$conf->name_string = 'Name';
		$conf->disabled_string = 'Deaktiviert';
		$conf->price_string = 'Preis';
		$conf->password_string = 'Passwort';
		$conf->submit_string = 'Senden';
		$conf->email_string = 'E-mail';
		$conf->account_string = 'Kontostand';
		$conf->admin_string = 'Admin';
		$conf->user_string = 'Benutzer';
		$conf->update_user_string = 'Aktualisieren benutzer';
		$conf->update_item_string = 'Aktualisieren artikel';
		$conf->info_string = 'Informationen';
		$conf->real_name_string = 'Echten namen';
		$conf->description_string = 'Beschreibung';
		$conf->add_new_item_string = 'Neues artikel hinzufügen';
		$conf->add_new_user_string = 'Neues benutzer hinzufügen';
		$conf->users_string = 'Benutzer';
		$conf->items_string = 'Artikel';
		$conf->signin_string = 'Sich eintragen';
		$conf->signout_string = 'Sich austragen';
		$conf->transaction_string = 'Transaktion';
		$conf->amount_string = 'Menge';
		
		// Title setup
		$conf->title = 'Schuldenliste';
		$conf->item_list_title = 'Preisliste';
		$conf->user_list_title = 'Benutzerliste';
		$conf->update_user_title = 'Aktualisieren benutzer';
		$conf->update_item_title = 'Aktualisieren artikel';
		$conf->user_view_title = 'Anzeigen benutzer';
		
		// Messages
		$conf->username_error_string = 'Benutzernamen wurde nicht festgelegt.';
		$conf->email_error_string = 'E-Mail wurde nicht festgelegt.';
		$conf->password_error_string = 'Passwort wurde nicht festgelegt.';
		$conf->add_user_error_string = 'Nicht in der Lage, neue Benutzer.';
		$conf->max_debt_error_string = 'Artikel konnte nicht kaufen. Max Schulden %d griff nach Konto.';
		$conf->purchase_auth_error_string = 'Artikel konnte nicht kaufen. Kein autorisierten Benutzer angemeldet.';
		$conf->item_nexist_error_string = 'Artikel mit der ID %d existiert nicht.';
		$conf->add_user_success_string = 'Benutzer erfolgreich hinzugefügt: %s';
		$conf->purchase_success_string = 'Gekaufte Artikel mit ID %d.';
		$conf->update_user_success_string = 'Erfolgreich aktualisiert benutzer %s.';
		$conf->update_user_error_string = 'Fehler beim benutzer %s zu aktualisieren.';
		$conf->remove_user_success_string = 'Benutzer erfolgreich entfernt %s.';
		$conf->remove_user_error_string = 'Fehler beim Benutzer %s entfernen..';
		$conf->invalid_user_id_string = 'Ungültige Benutzer-ID %d.';
		
		$conf->remove_item_success_string = 'Erfolgreich entfernt artikel %d.';
		$conf->remove_item_error_string = 'Fehler beim artikel entfernen %d.';
		$conf->invalid_item_id_string = 'Artikel-ID ungültig %d.';
		$conf->update_item_success_string = 'Erfolgreich aktualisiert artikel %d.';
		$conf->update_item_error_string = 'Fehler beim artikel aktualisierung %d.';
		$conf->add_item_success_string = 'Erfolgreich hinzugefügt artikel %d.';
		$conf->add_item_error_string = 'Fehler beim artikel hinzuzufügen.';
		
		$conf->signin_success_string = 'Melden sie sich an erfolgreich war. Willkommen, %s.';
		$conf->signin_error_string = 'Benutzername oder Passwort ungültig.';
		$conf->signout_success_string = 'Benutzer %s erfolgreich abgemeldet.';
		$conf->signout_error_string = 'Kein benutzer abmelden.';
		$conf->zero_value_transaction_error_string = 'Kann keine transaktion wert null.';
		$conf->transaction_success_string = 'Transaktion der betrag %d %s gelungen.';
		$conf->transaction_error_string = 'Transaktion fehlgeschlagen.';
		
		return $conf;
	}
};
?>