<h4 class="text-center">New Booking Class Room</h4>
<div class="col-xs-12 col-lg-6 col-lg-offset-3">
			<form action="<?php echo site_url('booking/initiallize');?>" method="post" class="form-horizontal">
				<div class="form-group">
    				<label class="col-sm-12 control-label"></label>
    			<div class="col-sm-0">
      					<input type="text" name="book_use_for" class="form-control" placeholder="Use For">
    				</div>
  				</div>

  				<div class="form-group">
    				<label class="col-sm-12 control-label"></label>
    			<div class="col-sm-0">
    			 <textarea name="book_use_description" class="form-control" cols="51" rows="5"></textarea>
    				</div>
  				</div>

				<!-- Single button -->
				
            <div class="row">
              <div class="col-xs-12 col-md-6">
              <div class="btn-group">
              <select class="form-control" name="book_room_id">
              <option value="0">Choose available time</option>
              <?php 
              if (isset($time)) {                
                foreach ($time as $key => $value) { ?>
                  <option value="<?php echo $value['id'];?>" >
                        <?php  echo $value['room_available_begin'].' - '.$value['room_available_end'];?>
                  </option>
                      <?php 
                    }
                }
              ?>
            </select>

            </div>
            </div>
              <div class="col-xs-12 col-md-6">
                  <a href="<?php echo site_url('booking/index');?>">Cancel</a>
                  <button type="reset" class="btn btn-default">Reset</button>
                  <button type="submit" class="btn btn-primary">Next</button>    
              </div>
            </div>
				
  			
			</form>
</div>