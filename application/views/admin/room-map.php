<div class="container">
	<div class="row">
		<div class="col-xs-12">
			
			<?php echo form_open_multipart('admin/upload_map');?>
				<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Upload Map <strong><?php echo (isset($room))? $room['room_name'] : 'none' ;?></strong></h4>
				</div>
				<div class="panel-body">
					<input type="hidden" name="id" value="<?php echo (isset($room))? $room['id'] : 0;?>" />
					<input type="file" name="room_file_map" class="form-control" />		
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-primary">Upload</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>