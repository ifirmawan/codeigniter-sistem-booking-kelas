
<div class="row">
<div class="col-xs-12 col-md-2" style="background-color: #eee;">
	<p style="vertical-align: middle;padding-top: 8px;">
		<strong >Available day :</strong>
	</p>
</div>
<div class="col-xs-12 col-md-10">
	
	<?php if (isset($available)){ ?>
	<ul class="nav nav-pills sibuk-nav">
	<?php foreach ($available as $key => $value){ ?>
			<li>
			<a href="<?php echo site_url('booking/day/'.$value['room_available_day']);?>">
				<?php echo $value['room_available_day'];?>
			</a></li>
	 <?php } ?>
		</ul>
	 	<?php } ?>

</div>
</div>	
<div class="row">
	<div class="col-xs-12 ">
		<?php echo (isset($konten))? $konten : 'no konten loaded';?>
	</div>
</div>