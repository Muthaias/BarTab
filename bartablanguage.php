<?php
class BarTabLanguage
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
	
	// Title setup
	public $title = 'Bar tab';
	public $item_list_title = 'Prislista';
	public $user_list_title = 'Användarlista';
	public $update_user_title = 'Uppdatera användare';
	public $update_item_title = 'Uppdatera objekt';
	public $user_view_title = 'Visa användare';
	
	public static function create_swedish()
	{
		// Site config
		$lang = new BarTabLanguage();
		$lang->purchase_string = 'Köp för';
		$lang->currency_string = 'B';
		$lang->username_string = 'Användarnamn';
		$lang->user_purchases_string = 'Användarköp';
		$lang->name_string = 'Namn';
		$lang->disabled_string = 'Avaktiverad';
		$lang->price_string = 'Pris';
		$lang->password_string = 'Lösenord';
		$lang->submit_string = 'Skicka';
		$lang->email_string = 'E-post';
		$lang->account_string = 'Saldo';
		$lang->admin_string = 'Admin';
		$lang->user_string = 'Användare';
		$lang->update_user_string = 'Justera användare';
		$lang->update_item_string = 'Justera objekt';
		$lang->info_string = 'Information';
		$lang->real_name_string = 'Fullt namn';
		$lang->description_string = 'Beskrivning';
		$lang->add_new_item_string = 'Lägg till nytt objekt';
		$lang->add_new_user_string = 'Lägg till ny användare';
		$lang->users_string = 'Användare';
		$lang->items_string = 'Objekt';
		$lang->signin_string = 'Logga in';
		$lang->signout_string = 'Logga ut';
		$lang->transaction_string = 'Överföring';
		$lang->amount_string = 'Belopp';
		
		// Title setup
		$lang->title = 'Skuldlistan';
		$lang->item_list_title = 'Prislista';
		$lang->user_list_title = 'Användarlista';
		$lang->update_user_title = 'Uppdatera användare';
		$lang->update_item_title = 'Uppdatera objekt';
		$lang->user_view_title = 'Visa användare';
		
		// Messages
		$lang->username_error_string = 'Användarnamn hade inget värde.';
		$lang->email_error_string = 'E-post krävs för alla användare.';
		$lang->password_error_string = 'Lösenordet var inte godkänt.';
		$lang->add_user_error_string = 'Kunde inte lägga till ny användare';
		$lang->max_debt_error_string = 'Kunde inte köpa objekt. Maximal skuld %d nådd på kontot.';
		$lang->purchase_auth_error_string = 'Kunde inte köpa objekt. Inget användare inloggad.';
		$lang->item_nexist_error_string = 'Objekt med id %d finns inte i listan.';
		$lang->add_user_success_string = 'Användare "%s" lades till.';
		$lang->purchase_success_string = 'Objekt med id %d köpt.';
		$lang->update_user_success_string = 'Updaterade användare %s.';
		$lang->update_user_error_string = 'Kunde inte uppdatera användare %s.';
		$lang->remove_user_success_string = 'Tog bort användare %s.';
		$lang->remove_user_error_string = 'Kunde inte ta bort användare %s.';
		$lang->invalid_user_id_string = 'Ogiltigt användar-id %d.';
		
		$lang->remove_item_success_string = 'Tog bort objekt %d.';
		$lang->remove_item_error_string = 'Kunde inte ta bort objekt %d.';
		$lang->invalid_item_id_string = 'Ogiltigt objekt-id %d.';
		$lang->update_item_success_string = 'Uppdaterade objekt %d.';
		$lang->update_item_error_string = 'Kunde inte uppdatera objekt %d.';
		$lang->add_item_success_string = 'Lade till objekt %d.';
		$lang->add_item_error_string = 'Kunde inte lägga till objekt.';
		
		$lang->signin_success_string = 'Inloggning lyckades. Välkommen, %s.';
		$lang->signin_error_string = 'Ogiltigt användarnamn eller lösenord.';
		$lang->signout_success_string = 'Utloggningen lyckades för användare %s.';
		$lang->signout_error_string = 'Ingen användare att logga ut.';
		$lang->zero_value_transaction_error_string = 'Kan inte göra överföring med värdet 0.';
		$lang->transaction_success_string = 'Överföring med värdet %d %s lyckades.';
		$lang->transaction_error_string = 'Överföringen misslyckades.';
		
		return $lang;
	}
	
	public static function create_english()
	{
		// Site config
		$lang = new BarTabLanguage();
		$lang->purchase_string = 'Buy for';
		$lang->currency_string = 'B';
		$lang->username_string = 'User name';
		$lang->user_purchases_string = 'User purchases';
		$lang->name_string = 'Name';
		$lang->disabled_string = 'Disabled';
		$lang->price_string = 'Price';
		$lang->password_string = 'Password';
		$lang->submit_string = 'Send';
		$lang->email_string = 'E-mail';
		$lang->account_string = 'Account balance';
		$lang->admin_string = 'Admin';
		$lang->user_string = 'User';
		$lang->update_user_string = 'Update user';
		$lang->update_item_string = 'Update item';
		$lang->info_string = 'Information';
		$lang->real_name_string = 'Real name';
		$lang->description_string = 'Description';
		$lang->add_new_item_string = 'Add new item';
		$lang->add_new_user_string = 'Add new user';
		$lang->users_string = 'Users';
		$lang->items_string = 'Items';
		$lang->signin_string = 'Sign in';
		$lang->signout_string = 'Sign out';
		$lang->transaction_string = 'Transaction';
		$lang->amount_string = 'Amount';
		
		// Title setup
		$lang->title = 'Bar tab';
		$lang->item_list_title = 'Price list';
		$lang->user_list_title = 'User list';
		$lang->update_user_title = 'Update user';
		$lang->update_item_title = 'Update item';
		$lang->user_view_title = 'Show user';
		
		// Messages
		$lang->username_error_string = 'User name was not set.';
		$lang->email_error_string = 'Email was not set.';
		$lang->password_error_string = 'Password was not set.';
		$lang->add_user_error_string = 'Unable to add new user.';
		$lang->max_debt_error_string = 'Could not purchase item. Max debt %d reached for account.';
		$lang->purchase_auth_error_string = 'Could not purchase item. No authorized user logged in.';
		$lang->item_nexist_error_string = 'Item with id %d does not exist.';
		$lang->add_user_success_string = 'Successfully added user: %s';
		$lang->purchase_success_string = 'Purchased item with id %d.';
		$lang->update_user_success_string = 'Successfully updated user %s.';
		$lang->update_user_error_string = 'Failed to update user %s.';
		$lang->remove_user_success_string = 'Successfully removed user %s.';
		$lang->remove_user_error_string = 'Failed to remove user %s.';
		$lang->invalid_user_id_string = 'Invalid user id %d.';
		
		$lang->remove_item_success_string = 'Successfully removed item %d.';
		$lang->remove_item_error_string = 'Failed to remove item %d.';
		$lang->invalid_item_id_string = 'Invalid item id %d.';
		$lang->update_item_success_string = 'Successfully updated item %d.';
		$lang->update_item_error_string = 'Failed to update item %d.';
		$lang->add_item_success_string = 'Successfully added item %d.';
		$lang->add_item_error_string = 'Failed to add item.';
		
		$lang->signin_success_string = 'Sign in was successful. Welcome, %s.';
		$lang->signin_error_string = 'Invalid username or password.';
		$lang->signout_success_string = 'Successfully signed out user %s.';
		$lang->signout_error_string = 'No user to sign out.';
		$lang->zero_value_transaction_error_string = 'Can not make transaction of value zero.';
		$lang->transaction_success_string = 'Transaction of amount %d %s succeded.';
		$lang->transaction_error_string = 'Transaction failed.';
		
		return $lang;
	}
	
	public static function create_german()
	{
		// Site config
		$lang = new BarTabLanguage();
		$lang->purchase_string = 'Kaufen für';
		$lang->currency_string = 'B';
		$lang->username_string = 'Benutzername';
		$lang->user_purchases_string = 'Benutzer einkäufe';
		$lang->name_string = 'Name';
		$lang->disabled_string = 'Deaktiviert';
		$lang->price_string = 'Preis';
		$lang->password_string = 'Passwort';
		$lang->submit_string = 'Senden';
		$lang->email_string = 'E-mail';
		$lang->account_string = 'Kontostand';
		$lang->admin_string = 'Admin';
		$lang->user_string = 'Benutzer';
		$lang->update_user_string = 'Aktualisieren benutzer';
		$lang->update_item_string = 'Aktualisieren artikel';
		$lang->info_string = 'Informationen';
		$lang->real_name_string = 'Echten namen';
		$lang->description_string = 'Beschreibung';
		$lang->add_new_item_string = 'Neues artikel hinzufügen';
		$lang->add_new_user_string = 'Neues benutzer hinzufügen';
		$lang->users_string = 'Benutzer';
		$lang->items_string = 'Artikel';
		$lang->signin_string = 'Sich eintragen';
		$lang->signout_string = 'Sich austragen';
		$lang->transaction_string = 'Transaktion';
		$lang->amount_string = 'Menge';
		
		// Title setup
		$lang->title = 'Schuldenliste';
		$lang->item_list_title = 'Preisliste';
		$lang->user_list_title = 'Benutzerliste';
		$lang->update_user_title = 'Aktualisieren benutzer';
		$lang->update_item_title = 'Aktualisieren artikel';
		$lang->user_view_title = 'Anzeigen benutzer';
		
		// Messages
		$lang->username_error_string = 'Benutzernamen wurde nicht festgelegt.';
		$lang->email_error_string = 'E-Mail wurde nicht festgelegt.';
		$lang->password_error_string = 'Passwort wurde nicht festgelegt.';
		$lang->add_user_error_string = 'Nicht in der Lage, neue Benutzer.';
		$lang->max_debt_error_string = 'Artikel konnte nicht kaufen. Max Schulden %d griff nach Konto.';
		$lang->purchase_auth_error_string = 'Artikel konnte nicht kaufen. Kein autorisierten Benutzer angemeldet.';
		$lang->item_nexist_error_string = 'Artikel mit der ID %d existiert nicht.';
		$lang->add_user_success_string = 'Benutzer erfolgreich hinzugefügt: %s';
		$lang->purchase_success_string = 'Gekaufte Artikel mit ID %d.';
		$lang->update_user_success_string = 'Erfolgreich aktualisiert benutzer %s.';
		$lang->update_user_error_string = 'Fehler beim benutzer %s zu aktualisieren.';
		$lang->remove_user_success_string = 'Benutzer erfolgreich entfernt %s.';
		$lang->remove_user_error_string = 'Fehler beim Benutzer %s entfernen..';
		$lang->invalid_user_id_string = 'Ungültige Benutzer-ID %d.';
		
		$lang->remove_item_success_string = 'Erfolgreich entfernt artikel %d.';
		$lang->remove_item_error_string = 'Fehler beim artikel entfernen %d.';
		$lang->invalid_item_id_string = 'Artikel-ID ungültig %d.';
		$lang->update_item_success_string = 'Erfolgreich aktualisiert artikel %d.';
		$lang->update_item_error_string = 'Fehler beim artikel aktualisierung %d.';
		$lang->add_item_success_string = 'Erfolgreich hinzugefügt artikel %d.';
		$lang->add_item_error_string = 'Fehler beim artikel hinzuzufügen.';
		
		$lang->signin_success_string = 'Melden sie sich an erfolgreich war. Willkommen, %s.';
		$lang->signin_error_string = 'Benutzername oder Passwort ungültig.';
		$lang->signout_success_string = 'Benutzer %s erfolgreich abgemeldet.';
		$lang->signout_error_string = 'Kein benutzer abmelden.';
		$lang->zero_value_transaction_error_string = 'Kann keine transaktion wert null.';
		$lang->transaction_success_string = 'Transaktion der betrag %d %s gelungen.';
		$lang->transaction_error_string = 'Transaktion fehlgeschlagen.';
		
		return $lang;
	}
};
?>