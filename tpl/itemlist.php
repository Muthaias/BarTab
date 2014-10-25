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
				<h2><?=$lang->item_list_title;?></h2>
				<ul class="list-group" id="item-listings">
<?php
foreach($list as $item)
{
?>
					<li class="list-group-item">
						<span class="glyphicon glyphicon-glass"></span> <?=$item->name;?><a href="purchase/<?=$item->id;?>" class="btn btn-default btn-xs pull-right"><?=$lang->purchase_string;?> <?=$item->price;?> <?=$lang->currency_string;?></a><a href="#" class="btn btn-info btn-xs pull-right" data-toggle="collapse" data-target="#item-info-<?=$item->id?>"><span class="glyphicon glyphicon-info-sign"></span></a>
						<div class="collapse" style="padding-left: 10px; margin-top: 10px; margin-left: 25px; border-left: solid 3px #99f;" id="item-info-<?=$item->id?>"><?=$item->description;?></div>
					</li>
<?php
}
?>
				</ul>
			</div>
		</div>