<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <me@cp0la.se> wrote this file.  As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return.   Mattias Nyberg
 * ----------------------------------------------------------------------------
 */
?>
		<div class="row">
			<div class="col-sx-12">
				<h2><?=$lang->user_string;?></h2>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?=$lang->username_string;?>: </strong><?=$user->username;?></div>
					<ul class="list-group" id="user-listings">
						<li class="list-group-item"><strong><?=$lang->name_string;?>: </strong><?=$user->real_name;?></li>
						<li class="list-group-item"><strong><?=$lang->email_string;?>: </strong><?=$user->email;?></li>
						<li class="list-group-item"><strong><?=$lang->account_string;?>: </strong><?=$user->account;?></li>
					</ul>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?=$lang->user_purchases_string;?></strong></div>
					<ul class="list-group" id="user-listings">
<?php
foreach($purchases as $purchase)
{
?>
	<li class="list-group-item"><span class="glyphicon glyphicon-glass"></span> <?=$purchase->item->name;?><span class="badge badge-info"><?=$purchase->count;?></span></li>
<?php
}
?>
					</ul>
				</div>
			</div>
		</div>