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
    			<h2><?=$lang->update_item_string?></h2>
				<form role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?=$item->id?>">
					<div class="form-group">
						<label for="name"><?=$lang->name_string?></label>
						<input type="text" class="form-control" name="name" placeholder="<?=$lang->name_string?>" value="<?=$item->name?>">
					</div>
					<div class="form-group">
						<label for="price"><?=$lang->price_string?></label>
						<input type="text" class="form-control" name="price" placeholder="<?=$lang->price_string?>" value="<?=$item->price?>">
					</div>
					<div class="form-group">
						<label for="description"><?=$lang->description_string?></label>
						<textarea class="form-control" name="description" placeholder="<?=$lang->description_string?>"><?=$item->description?></textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="disabled" <?=$item->disabled ? 'checked="checked"':''?>> <?=$lang->disabled_string?>
						</label>
					</div>
					<button type="submit" class="btn btn-default"><?=$lang->submit_string?></button>
				</forum>
			</div>
		</div>
		<hr/>
