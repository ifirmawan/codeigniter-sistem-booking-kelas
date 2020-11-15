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
		
			<div class="panel-heading">
        <h4 class="panel-title">Your booking time currently</h4>
      </div>
      <div class="panel-body">
        <div class="col-xs-12 col-md-4"><h3 id="hours">00</h3></div>
        <div class="col-xs-12 col-md-4"><h3 id="minutes">00</h3></div>
        <div class="col-xs-12 col-md-4"><h3 id="seconds">00</h3></div>
      </div>
      <div class="panel-footer ">
        <a href="<?php echo site_url('booking/out/'.$booking[0]['id']);?>" class="btn btn-primary btn-done">I'm done</a>
      </div>
    </div>
		
	</div>
</div>
<div class="left_time" style="display: none;"><?php echo $room->room_available_end;?></div>