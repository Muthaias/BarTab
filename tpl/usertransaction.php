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
    			<h2><?=$lang->transaction_string?></h2>
				<form role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="id" value="0">
					<div class="form-group">
						<label for="amount"><?=$lang->amount_string?></label>
						<input type="text" class="form-control" name="amount" placeholder="<?=$lang->amount_string?>" value="0">
					</div>
					<button type="submit" class="btn btn-default"><?=$lang->submit_string?></button>
				</forum>
			</div>
		</div>
		<hr/>