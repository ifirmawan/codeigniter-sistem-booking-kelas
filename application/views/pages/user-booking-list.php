<div class="row">
	<div class="col-xs-12">
		 <ul class="pager">
  			<li class="previous"><a href="#"><i class="glyphicon glyphicon-chevron-left"></i>&nbspOlder</a></li>
  			<li class="next"><a href="#">Newer&nbsp<i class="glyphicon glyphicon-chevron-right"></i></a></li>
		</ul>
	</div>
</div>
<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Class room</th>
			<th>Support room</th>
			<th>Booking time</th>
			<th>Request at</th>
			<th>Status</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($booking)): ?>
			<?php 
			$no =1;
			foreach ($booking as $key => $value) { 
			$room 		= get_detail_room($value['book_room_id']);
			$room_time	= $room->room_available_begin.'-'.$room->room_available_end;
			$supp_name	= get_support_name($value['book_support_id']); ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $room->room_name;?></td>
					<td><?php echo $supp_name;?></td>
					<td><?php echo $room_time;?></td>
					<td><?php echo $value['book_created'];?></td>
					<td><?php echo $value['book_status']; ?></td>
					<td>
						<a href="" class="btn btn-default">View Map</a>
						<a href="" class="btn btn-primary">Detail</a>
						<?php
							if ($value['book_status'] == 'accepted') { ?>
								<a href="#" class="btn btn-warning">Enter code</a>
							<?php }
						?>
					</td>
			</tr>
			<?php
					$no++; 
				} 
			?>
		<?php endif;?>
	</tbody>
</table>