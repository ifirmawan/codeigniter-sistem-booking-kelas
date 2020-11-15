<div class="row">
	<div class="col-xs-12 col-lg-6">
	<div class="page-header">
	<h3><a href="#"><?php echo $room->room_name;?></a></h3>
<p>
	at day
	<strong><?php echo $room->room_available_day;?></strong>
	from
	<strong><?php echo $room->room_available_begin;?></strong>
	until
	<strong><?php echo $room->room_available_end;?></strong>
</p>
</div>
<table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Facilities</th>
      <th>Qty</th>
      <th>Status</th>
      <th>Use it</th>
    </tr>
    <?php if(isset($fc_list)): 
      $no=1;
     foreach ($fc_list as $key => $value) : ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $value['fc_name'];?></td>
            <td><?php echo $value['fc_qty'];?></td>
            <td><?php echo $value['fc_quality_status'];?></td>
            <td>
            	<input type="hidden" class="id_booking" value="<?php echo (isset($booking))? $booking['id'] : 0;?>" />
              <input type="hidden" class="id_fc" value="<?php echo $value['id'];?>" />
              <input type="checkbox" class="check-use-fc" value="<?php echo $value['id'];?>" />
            </td>
        </tr>
      <?php 
        $no++;
        endforeach; 
      endif;?>
</table>
	</div>
<div class="col-xs-12 col-lg-6">
		<form action="<?php echo site_url('booking/done');?>" method="post">
			<div class="form-group">
    			<label class="col-sm-12 control-label">Use for</label>
      		<input type="text" name="book_use_for" class="form-control" placeholder="Use For">
  			</div>
  			<div class="form-group">
			<label class="col-sm-12 control-label">Description</label>
				<textarea name="book_use_description" class="form-control" cols="51" rows="5"></textarea>
  			</div>
  			<input type="text" class="form-control" name="book_pic_name" placeholder="Who is responsibilty?" required/>
          <input type="checkbox" class="im_in"><b>I'm in charge</b>
          <button type="submit" class="btn btn-success col-xs-12">Done !</button>
		</form>
	</div>

</div>