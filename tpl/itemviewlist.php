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
				<h2><?=$item_list_title_string;?></h2>
				<ul class="list-group" id="item-listings">
<?php
foreach($list as $i)
{
?>
					<li class="list-group-item <?=($i->id==$item->id)?'active':''?>"><span class="glyphicon glyphicon-<?=$item_type?>"></span> <?=$i->name;?><a href="<?=$i->id;?>" class="btn btn-info btn-xs pull-right"><span class="glyphicon glyphicon-edit"></span></a></li>
<?php
}
?>
				</ul>
			</div>
		</div>