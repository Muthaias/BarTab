	<div class="row">
		<h2><?=$conf->signin_string?></h2>
		<form role="form" method="post">
			<div class="form-group">
				<label for="username"><?=$conf->username_string?></label>
				<input type="text" class="form-control" name="username" placeholder="<?=$conf->username_string?>">
			</div>
			<div class="form-group">
				<label for="password"><?=$conf->password_string?></label>
				<input type="password" class="form-control" name="password" placeholder="<?=$conf->password_string?>">
			</div>
			<button type="submit" class="btn btn-default"><?=$conf->submit_string?></button>
		</form>
  	</div>