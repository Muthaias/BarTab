		<div class="row">
			<div class="col-sx-12">
				<h2><?=$item_list_title_string;?></h2>
				<div class="list-group" id="item-listings">
					<a href="0" class="list-group-item <?=(0==$item->id)?'active':''?>"><span class="glyphicon glyphicon-<?=$item_type?>"></span> <?=$new_item_string?></a>
				</div>
				<ul class="list-group" id="item-listings">
<?php
foreach($list as $i)
{
?>
					<li class="list-group-item <?=($i->id==$item->id)?'active':''?>"><span class="glyphicon glyphicon-<?=$item_type?>"></span> <?=$i->name;?><a href="remove/<?=$i->id;?>" class="btn btn-warning btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></a><a href="<?=$i->id;?>" class="btn btn-info btn-xs pull-right"><span class="glyphicon glyphicon-edit"></span></a></li>
<?php
}
?>
				</ul>
			</div>
		</div>