		<div class="row">
    		<div class="col-sx-12">
    			<h2><?=$conf->transaction_string?></h2>
				<form role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="amount"><?=$conf->amount_string?></label>
						<input type="text" class="form-control" name="amount" placeholder="<?=$conf->amount_string?>" value="0">
					</div>
					<button type="submit" class="btn btn-default"><?=$conf->submit_string?></button>
				</forum>
			</div>
		</div>
		<hr/>