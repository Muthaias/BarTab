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
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?=$conf->title;?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=$conf->get_data_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?=$conf->get_data_url('css/bootstrap-theme.min.css');?>">
	<style>
		body{padding: 10px; padding-top: 70px;}
	</style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?=$conf->title;?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
          <ul class="nav navbar-nav">
            <li><a href="#"><?=$conf->item_list_title;?></a></li>
            <li><a href="#"><?=$conf->user_list_title;?></a></li>
            <li><a href="#"><?=$conf->user_string;?></a></li>
            <li><a href="#"><?=$conf->admin_string;?></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container">
    	<div class="row">
    		<div class="col-sx-12">
    			<h2><?=$conf->update_item_title;?></h2>
				<form role="form" method="post">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="name"><?=$conf->name_string;?></label>
						<input type="text" class="form-control" name="name" placeholder="<?=$conf->name_string;?>" value="">
					</div>
					<div class="form-group">
						<label for="price"><?=$conf->price_string;?></label>
						<input type="text" class="form-control" name="price" placeholder="<?=$conf->price_string;?>" value="">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> <?=$conf->disabled_string;?>
						</label>
					</div>
					<button type="submit" class="btn btn-default"><?=$conf->submit_string;?></button>
				</forum>
			</div>
		</div>
		<hr/>
		
		<div class="row">
    		<div class="col-sx-12">
    			<h2><?=$conf->update_user_title;?></h2>
				<form role="form" method="post">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="username"><?=$conf->username_string;?></label>
						<input type="text" class="form-control" name="username" placeholder="<?=$conf->username_string;?>" value="">
					</div>
					<div class="form-group">
						<label for="name"><?=$conf->name_string;?></label>
						<input type="text" class="form-control" name="name" placeholder="<?=$conf->name_string;?>" value="">
					</div>
					<div class="form-group">
						<label for="name"><?=$conf->email_string;?></label>
						<input type="text" class="form-control" name="email" placeholder="<?=$conf->email_string;?>" value="">
					</div>
					<div class="form-group">
						<label for="password"><?=$conf->password_string;?></label>
						<input type="password" class="form-control" name="password" placeholder="<?=$conf->password_string;?>" value="">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> <?=$conf->disabled_string;?>
						</label>
					</div>
					<button type="submit" class="btn btn-default"><?=$conf->submit_string;?></button>
				</forum>
			</div>
		</div>
		<hr/>
		
		<div class="row">
			<div class="col-sx-12">
				<h2><?=$conf->item_list_title;?></h2>
				<ul class="list-group" id="item-listings">
<?php
for($i = 0; $i < 5; $i++)
{
?>
					<li class="list-group-item"><span class="glyphicon glyphicon-glass"></span> Westons vintage - Apple<a href="" class="btn btn-default btn-xs pull-right"><?=$conf->purchase_string;?> 15 <?=$conf->currency_string;?></a></li>
<?php
}
?>
				</ul>
			</div>
		</div>
		<hr/>
		
		<div class="row">
			<div class="col-sx-12">
				<h2><?=$conf->user_list_title;?></h2>
				<ul class="list-group" id="user-listings">
<?php
for($i = 0; $i < 5; $i++)
{
?>
					<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> Barbro Nyberg<span class="badge badge-info"> -400 <?=$conf->currency_string;?></span></li>
<?php
}
?>
				</ul>
			</div>
		</div>
		<hr/>
		
		<div class="row">
			<div class="col-sx-12">
				<h2><?=$conf->user_view_title;?></h2>
				<div class="panel panel-default">
					<div class="panel-heading"><strong><?=$conf->user_string;?>: </strong>muthaias</div>
					<ul class="list-group" id="user-listings">
						<li class="list-group-item"><strong><?=$conf->name_string;?>: </strong>Barbro Nyberg</li>
						<li class="list-group-item"><strong><?=$conf->email_string;?>: </strong>muthaias.uu@gmail.com</li>
						<li class="list-group-item"><strong><?=$conf->account_string;?>: </strong>-400</li>
					</ul>
				</div>
			</div>
		</div>
    
    
		<hr/>
		<div class="row">
		</div>
    </div><!-- /.container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?=$conf->get_data_url('js/bootstrap.min.js');?>"></script>
</body>
</html>