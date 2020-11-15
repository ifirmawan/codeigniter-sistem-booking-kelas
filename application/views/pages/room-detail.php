<div class="row">
<div class="col-xs-12 col-md-4">
	<?php 
		$img_src = base_url().'maps/';
		$img_src .= (is_null($info->room_file_map) || empty($info->room_file_map))? 'map-default.png' : $info->room_file_map;
	?>
	<img src="<?php echo $img_src;?>" class="col-xs-12 col-md-4"/>
	<?php if(is_null($info->room_file_map) || empty($info->room_file_map)): ?>
		<a href="#">request map</a>
	<?php endif; ?>
</div>
<div class="col-xs-12 col-md-4">
	<h2><?php echo $info->room_name;?> <smll>at floor <?php echo $info->room_floor;?></small></h2>
	<h3><?php echo get_support_name($info->room_support_id);?></h3>
	<div >
		<span class="label label-default" style="margin-right: 5px;">
			<i class="glyphicon glyphicon-phone"></i> 
			<?php echo $support->support_kontak_hp;?>
		</span>
		<span class="label label-primary" style="margin-right: 5px;">
			<i class="glyphicon glyphicon-envelope"></i> 
			<?php echo $support->support_email;?>
		</span>
	</div>
</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<table class="table">
			<?php if ($fc_list) {
				foreach ($fc_list as $key => $value) {  ?>
					<tr>
						<td><?php echo $value['fc_name'];?></td>
						<td><?php echo $value['fc_qty'];?></td>
						<td><?php echo $value['fc_quality_status'];?></td>
					</tr>
				<?php }
			}?>
		</table>
	</div>
</div>