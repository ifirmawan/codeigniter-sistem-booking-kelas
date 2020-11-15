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
      <th>Have receive ?</th>
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
            	<input type="hidden" class="id_booking" value="<?php echo (isset($booking[0]['id']))? $booking[0]['id'] : 0;?>" />
              <input type="hidden" class="id_fc" value="<?php echo $value['id'];?>" />
              <input type="hidden" name="data_status" value="received" />
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
		<form action="<?php echo site_url('booking/verify');?>" method="post">
			<div class="panel-heading">
        <h3>To use this room</h3>
        <h4 class="panel-title">Please enter code first</h4>
      </div>
      <div class="panel-body">
       <div class="form-group">
         <input type="text" name="book_support_code" class="form-control" placeholder="Enter Code Support" />
       </div> 
      </div>
      <div class="panel-footer ">
        <input type="hidden" name="id" value="<?php echo $booking[0]['id'];?>">
        <button type="submit" class="btn btn-primary col-xs-12">Submit</button>
      </div>
    </div>
		</form>
	</div>
</div>