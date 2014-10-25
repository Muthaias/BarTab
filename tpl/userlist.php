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
				<h2><?=$lang->user_list_title;?></h2>
				<ul class="list-group" id="user-listings">
<?php
foreach($list as $user)
{
?>
					<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> <?=$user->real_name;?><span class="badge badge-info"> <?=$user->account;?> <?=$lang->currency_string;?></span><span class="badge alert-info"><?=($user->admin?$lang->admin_string:'');?></span></li>
<?php
}
?>
				</ul>
			</div>
		</div>