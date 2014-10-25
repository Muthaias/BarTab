		<div class="row">
    		<div class="col-sx-12">
    			<h2><?=$conf->update_item_string?></h2>
				<form role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?=$item->id?>">
					<div class="form-group">
						<label for="name"><?=$conf->name_string?></label>
						<input type="text" class="form-control" name="name" placeholder="<?=$conf->name_string?>" value="<?=$item->name?>">
					</div>
					<div class="form-group">
						<label for="price"><?=$conf->price_string?></label>
						<input type="text" class="form-control" name="price" placeholder="<?=$conf->price_string?>" value="<?=$item->price?>">
					</div>
					<div class="form-group">
						<label for="description"><?=$conf->description_string?></label>
						<textarea class="form-control" name="description" placeholder="<?=$conf->description_string?>"><?=$item->description?></textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="disabled" <?=$item->disabled ? 'checked="checked"':''?>> <?=$conf->disabled_string?>
						</label>
					</div>
					<button type="submit" class="btn btn-default"><?=$conf->submit_string?></button>
				</forum>
			</div>
		</div>
		<hr/>
