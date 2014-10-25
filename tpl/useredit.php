		<div class="row">
    		<div class="col-sx-12">
    			<h2><?=$lang->update_user_string?></h2>
				<form role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="name"><?=$lang->username_string?></label>
						<input type="text" class="form-control" name="name" placeholder="<?=$lang->username_string?>" value="<?=$user->username?>">
					</div>
					<div class="form-group">
						<label for="real_name"><?=$lang->real_name_string?></label>
						<input type="text" class="form-control" name="real_name" placeholder="<?=$lang->real_name_string?>" value="<?=$user->real_name?>">
					</div>
					<div class="form-group">
						<label for="email"><?=$lang->email_string?></label>
						<input type="text" class="form-control" name="email" placeholder="<?=$lang->email_string?>" value="<?=$user->email?>">
					</div>
					<div class="form-group">
						<label for="password"><?=$lang->password_string?></label>
						<input type="password" class="form-control" name="password" placeholder="<?=$lang->password_string?>" value="">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="disabled" <?=$user->disabled ? 'checked="checked"':''?>> <?=$lang->disabled_string?>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="admin" <?=$user->admin ? 'checked="checked"':''?>> <?=$lang->admin_string?>
						</label>
					</div>
					<button type="submit" class="btn btn-default"><?=$lang->submit_string?></button>
				</forum>
			</div>
		</div>
		<hr/>