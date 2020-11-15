<table class="table">
  <?php if (isset($room)) : ?>
  <thead>
  <tr>
    <th colspan="2">Class Name</th>
    <td colspan="3">
      <strong><h3><?php echo $room->room_name ;?></h3></strong>
      <input type="hidden" class="id_booking" value="<?php echo (isset($booking))? $booking['id'] : 0;?>" />
    </td>
  </tr>
  <tr>
    <td colspan="5">
      <a href="#" class="btn btn-default col-xs-12">View on map</a>
    </td>
  </tr>
  <tr>
    <th colspan="2">Support Name</th>
    <td colspan="3"><?php echo get_support_name($room->room_support_id);?></td>
  </tr>
  <tr>
    <th colspan="2">at Floor</th>
    <td colspan="3"><?php echo $room->room_floor;?></td>
  </tr>
  </thead>
<?php endif; ?>
  <tbody class="table table-bordered">
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
              <input type="hidden" class="id_fc" value="<?php echo $value['id'];?>" />
              <input type="checkbox" class="check-use-fc" value="<?php echo $value['id'];?>" />
            </td>
        </tr>
      <?php 
        $no++;
        endforeach; 
      endif;?>
      <form action="<?php echo site_url('booking/done');?>" method="post">
        <tr>
          <td colspan="2"><input type="text" class="form-control" name="book_pic_name" placeholder="Who is responsibilty?" required/> </td>
          <td colspan="2"><input type="checkbox" class="im_in"><b>I'm in charge</b></td>
          <td><button type="submit" class="btn btn-success col-xs-12">Done !</button></td>
        </tr>
      </form>
  </tbody>
</table>

