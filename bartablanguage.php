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
	
	public function set_swedish()
	{
		// Site config
		$this->purchase_string = 'Köp för';
		$this->currency_string = 'B';
		$this->username_string = 'Användarnamn';
		$this->user_purchases_string = 'Användarköp';
		$this->name_string = 'Namn';
		$this->disabled_string = 'Avaktiverad';
		$this->price_string = 'Pris';
		$this->password_string = 'Lösenord';
		$this->submit_string = 'Skicka';
		$this->email_string = 'E-post';
		$this->account_string = 'Saldo';
		$this->admin_string = 'Admin';
		$this->user_string = 'Användare';
		$this->update_user_string = 'Justera användare';
		$this->update_item_string = 'Justera objekt';
		$this->info_string = 'Information';
		$this->real_name_string = 'Fullt namn';
		$this->description_string = 'Beskrivning';
		$this->add_new_item_string = 'Lägg till nytt objekt';
		$this->add_new_user_string = 'Lägg till ny användare';
		$this->users_string = 'Användare';
		$this->items_string = 'Objekt';
		$this->signin_string = 'Logga in';
		$this->signout_string = 'Logga ut';
		$this->transaction_string = 'Överföring';
		$this->amount_string = 'Belopp';
		
		// Title setup
		$this->title = 'Skuldlistan';
		$this->item_list_title = 'Prislista';
		$this->user_list_title = 'Användarlista';
		$this->update_user_title = 'Uppdatera användare';
		$this->update_item_title = 'Uppdatera objekt';
		$this->user_view_title = 'Visa användare';
		
		// Messages
		$this->username_error_string = 'Användarnamn hade inget värde.';
		$this->email_error_string = 'E-post krävs för alla användare.';
		$this->password_error_string = 'Lösenordet var inte godkänt.';
		$this->add_user_error_string = 'Kunde inte lägga till ny användare';
		$this->max_debt_error_string = 'Kunde inte köpa objekt. Maximal skuld %d nådd på kontot.';
		$this->purchase_auth_error_string = 'Kunde inte köpa objekt. Inget användare inloggad.';
		$this->item_nexist_error_string = 'Objekt med id %d finns inte i listan.';
		$this->add_user_success_string = 'Användare "%s" lades till.';
		$this->purchase_success_string = 'Objekt med id %d köpt.';
		$this->update_user_success_string = 'Updaterade användare %s.';
		$this->update_user_error_string = 'Kunde inte uppdatera användare %s.';
		$this->remove_user_success_string = 'Tog bort användare %s.';
		$this->remove_user_error_string = 'Kunde inte ta bort användare %s.';
		$this->invalid_user_id_string = 'Ogiltigt användar-id %d.';
		
		$this->remove_item_success_string = 'Tog bort objekt %d.';
		$this->remove_item_error_string = 'Kunde inte ta bort objekt %d.';
		$this->invalid_item_id_string = 'Ogiltigt objekt-id %d.';
		$this->update_item_success_string = 'Uppdaterade objekt %d.';
		$this->update_item_error_string = 'Kunde inte uppdatera objekt %d.';
		$this->add_item_success_string = 'Lade till objekt %d.';
		$this->add_item_error_string = 'Kunde inte lägga till objekt.';
		
		$this->signin_success_string = 'Inloggning lyckades. Välkommen, %s.';
		$this->signin_error_string = 'Ogiltigt användarnamn eller lösenord.';
		$this->signout_success_string = 'Utloggningen lyckades för användare %s.';
		$this->signout_error_string = 'Ingen användare att logga ut.';
		$this->zero_value_transaction_error_string = 'Kan inte göra överföring med värdet 0.';
		$this->transaction_success_string = 'Överföring med värdet %d %s lyckades.';
		$this->transaction_error_string = 'Överföringen misslyckades.';
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
	
	public function set_german()
	{
		$this->purchase_string = 'Kaufen für';
		$this->currency_string = 'B';
		$this->username_string = 'Benutzername';
		$this->user_purchases_string = 'Benutzer einkäufe';
		$this->name_string = 'Name';
		$this->disabled_string = 'Deaktiviert';
		$this->price_string = 'Preis';
		$this->password_string = 'Passwort';
		$this->submit_string = 'Senden';
		$this->email_string = 'E-mail';
		$this->account_string = 'Kontostand';
		$this->admin_string = 'Admin';
		$this->user_string = 'Benutzer';
		$this->update_user_string = 'Aktualisieren benutzer';
		$this->update_item_string = 'Aktualisieren artikel';
		$this->info_string = 'Informationen';
		$this->real_name_string = 'Echten namen';
		$this->description_string = 'Beschreibung';
		$this->add_new_item_string = 'Neues artikel hinzufügen';
		$this->add_new_user_string = 'Neues benutzer hinzufügen';
		$this->users_string = 'Benutzer';
		$this->items_string = 'Artikel';
		$this->signin_string = 'Sich eintragen';
		$this->signout_string = 'Sich austragen';
		$this->transaction_string = 'Transaktion';
		$this->amount_string = 'Menge';
		
		// Title setup
		$this->title = 'Schuldenliste';
		$this->item_list_title = 'Preisliste';
		$this->user_list_title = 'Benutzerliste';
		$this->update_user_title = 'Aktualisieren benutzer';
		$this->update_item_title = 'Aktualisieren artikel';
		$this->user_view_title = 'Anzeigen benutzer';
		
		// Messages
		$this->username_error_string = 'Benutzernamen wurde nicht festgelegt.';
		$this->email_error_string = 'E-Mail wurde nicht festgelegt.';
		$this->password_error_string = 'Passwort wurde nicht festgelegt.';
		$this->add_user_error_string = 'Nicht in der Lage, neue Benutzer.';
		$this->max_debt_error_string = 'Artikel konnte nicht kaufen. Max Schulden %d griff nach Konto.';
		$this->purchase_auth_error_string = 'Artikel konnte nicht kaufen. Kein autorisierten Benutzer angemeldet.';
		$this->item_nexist_error_string = 'Artikel mit der ID %d existiert nicht.';
		$this->add_user_success_string = 'Benutzer erfolgreich hinzugefügt: %s';
		$this->purchase_success_string = 'Gekaufte Artikel mit ID %d.';
		$this->update_user_success_string = 'Erfolgreich aktualisiert benutzer %s.';
		$this->update_user_error_string = 'Fehler beim benutzer %s zu aktualisieren.';
		$this->remove_user_success_string = 'Benutzer erfolgreich entfernt %s.';
		$this->remove_user_error_string = 'Fehler beim Benutzer %s entfernen..';
		$this->invalid_user_id_string = 'Ungültige Benutzer-ID %d.';
		
		$this->remove_item_success_string = 'Erfolgreich entfernt artikel %d.';
		$this->remove_item_error_string = 'Fehler beim artikel entfernen %d.';
		$this->invalid_item_id_string = 'Artikel-ID ungültig %d.';
		$this->update_item_success_string = 'Erfolgreich aktualisiert artikel %d.';
		$this->update_item_error_string = 'Fehler beim artikel aktualisierung %d.';
		$this->add_item_success_string = 'Erfolgreich hinzugefügt artikel %d.';
		$this->add_item_error_string = 'Fehler beim artikel hinzuzufügen.';
		
		$this->signin_success_string = 'Melden sie sich an erfolgreich war. Willkommen, %s.';
		$this->signin_error_string = 'Benutzername oder Passwort ungültig.';
		$this->signout_success_string = 'Benutzer %s erfolgreich abgemeldet.';
		$this->signout_error_string = 'Kein benutzer abmelden.';
		$this->zero_value_transaction_error_string = 'Kann keine transaktion wert null.';
		$this->transaction_success_string = 'Transaktion der betrag %d %s gelungen.';
		$this->transaction_error_string = 'Transaktion fehlgeschlagen.';
	}
	
	public static function create_swedish()
	{
		$lang = new BarTabLanguage();
		$lang->set_swedish();
		return $lang;
	}
	
	public static function create_english()
	{
		$lang = new BarTabLanguage();
		$lang->set_english();
		return $lang;
	}
	
	public static function create_german()
	{
		$lang = new BarTabLanguage();
		$lang->set_german();
		return $lang;
	}
};
?>