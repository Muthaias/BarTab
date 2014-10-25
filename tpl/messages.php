		<div class="row">
<?php
foreach($messages as $message)
{
?>
			<div class="alert <?=$message->type?> alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong><?=$message->title?>:</strong> <?=$message->text?>
			</div>
<?php
}
?>
		</div>