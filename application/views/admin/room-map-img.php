<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<h2><strong><?php echo (isset($room['room_name']))? $room['room_name']. ' at floor '.$room['room_floor'] : '';?> </strong></h2>
			<img src="<?php echo (isset($img_src))? $img_src : '';?>" class="col-xs-12" />
		</div>
	</div>
</div>