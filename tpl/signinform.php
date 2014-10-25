	<div class="row">
		<h2><?=$lang->signin_string?></h2>
		<form role="form" method="post">
			<div class="form-group">
				<label for="username"><?=$lang->username_string?></label>
				<input type="text" class="form-control" name="username" placeholder="<?=$lang->username_string?>">
			</div>
			<div class="form-group">
				<label for="password"><?=$lang->password_string?></label>
				<input type="password" class="form-control" name="password" placeholder="<?=$lang->password_string?>">
			</div>
			<button type="submit" class="btn btn-default"><?=$lang->submit_string?></button>
		</form>
  	</div>