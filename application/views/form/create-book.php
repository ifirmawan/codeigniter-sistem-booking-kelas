<form action="<?php echo site_url('booking/initial');?>" method="post">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <select name="book_day" class="form-control ">
          <option value="0">Choose day</option>
          <?php if (isset($list_day)) {
            foreach ($list_day as $key => $value) { ?>
              <option value="<?php echo $value;?>" <?php echo (isset($_GET['day']) && $_GET['day'] == $value)? 'selected' : '';?>>
              <?php echo $value;?></option>
            <?php }
          } ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-6">
        <select name="book_room_id" class="form-control">
          <option value="0">Choose time</option>

<?php if(isset($_GET['day'])):
            $data = get_time_by($_GET['day']);
            if ($data) {
              foreach ($data as $key => $value) { ?>
                <option value="<?php echo $value['id'];?>" >
                <?php echo $value['room_available_begin'].'-'.$value['room_available_end'];?></option>
              <?php }
            }else{ ?>
              <option value="0">not available</option>
            <?php }
endif;?>

        </select>
    </div>
    
    </div>
    <div class="row">
      <div class="col-xs-12">
      <div class="form-group">
        <label>Use for</label>
        <input type="text" class="form-control" name="book_use_for" placeholder="type a purpose" />
      </div>
      <div class="form-group">
        <label>Describe of use this room</label>
        <textarea class="form-control" rows="5" name="book_use_description" placeholder="descibe something"></textarea>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary col-xs-12" >Create</button>    
      </div>
    </div>
 </form>
