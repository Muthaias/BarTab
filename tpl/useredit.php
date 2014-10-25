		<div class="row">
    		<div class="col-sx-12">
    			<h2><?=$conf->update_user_string?></h2>
				<form role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="name"><?=$conf->username_string?></label>
						<input type="text" class="form-control" name="name" placeholder="<?=$conf->username_string?>" value="<?=$user->username?>">
					</div>
					<div class="form-group">
						<label for="real_name"><?=$conf->real_name_string?></label>
						<input type="text" class="form-control" name="real_name" placeholder="<?=$conf->real_name_string?>" value="<?=$user->real_name?>">
					</div>
					<div class="form-group">
						<label for="email"><?=$conf->email_string?></label>
						<input type="text" class="form-control" name="email" placeholder="<?=$conf->email_string?>" value="<?=$user->email?>">
					</div>
					<div class="form-group">
						<label for="password"><?=$conf->password_string?></label>
						<input type="password" class="form-control" name="password" placeholder="<?=$conf->password_string?>" value="">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="disabled" <?=$user->disabled ? 'checked="checked"':''?>> <?=$conf->disabled_string?>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="admin" <?=$user->admin ? 'checked="checked"':''?>> <?=$conf->admin_string?>
						</label>
					</div>
					<button type="submit" class="btn btn-default"><?=$conf->submit_string?></button>
				</forum>
			</div>
		</div>
		<hr/>