<table class="table table-bordered">
	<tr>
		<th>Support Name</th>
		<th>Class Name</th>
		<th>At Floor</th>
		<th>Available from</th>
		<th>Until</th>
		<th>Options</th>
	</tr>
<?php foreach ($list_room as $key => $value) { ?>
	<form action="<?php echo site_url('booking/initial');?>" method="post"/>
	<tr>
		<td><?php echo get_support_name($value['room_support_id']);?></td>
		<td><?php echo $value['room_name'];?></td>
		<td><?php echo $value['room_floor'];?></td>
		<td><?php echo $value['room_available_begin'];?></td>
		<td><?php echo $value['room_available_begin'];?></td>
		<td>
			<div class="btn-group">
  				<a href="<?php echo site_url('booking/info_room/'.$value['id']);?>" class="btn btn-default">View detail</a>
  				<input type="hidden" value="<?php echo $value['id'];?>" name="book_room_id"/>
  				<input type="hidden" value="<?php echo $value['room_available_day'];?>" name="book_day"/>
  				<input type="hidden" value="<?php echo $value['room_support_id'];?>" name="book_support_id"/>
  				<button type="submit" class="btn btn-primary">Booking now!</button>
			</div>
		</td>
	</tr>
	</form>
<?php } ?>
</table>

