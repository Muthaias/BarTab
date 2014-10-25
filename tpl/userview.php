		<div class="row">
			<div class="col-sx-12">
				<h2><?=$conf->user_string;?></h2>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?=$conf->username_string;?>: </strong><?=$user->username;?></div>
					<ul class="list-group" id="user-listings">
						<li class="list-group-item"><strong><?=$conf->name_string;?>: </strong><?=$user->real_name;?></li>
						<li class="list-group-item"><strong><?=$conf->email_string;?>: </strong><?=$user->email;?></li>
						<li class="list-group-item"><strong><?=$conf->account_string;?>: </strong><?=$user->account;?></li>
					</ul>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?=$conf->user_purchases_string;?></strong></div>
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