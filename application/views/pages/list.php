<?php if(!isset($user)): ?>
<div class="container">
  <div class="page-header">
  <div class="row">
  	<div class="col-xs-12 col-md-3">
  		<img src="<?php echo base_url('assets/images/sibuk-logo.jpg');?>" class="col-xs-12 col-lg-6" />
  	</div>
  	<div class="col-xs-12 col-md-9">
  	<h1>Sibuk <small>Sistem Booking Kelas</small></h1>
    <p>Sistem pelayanan untuk memesan kelas ke akademik, untuk informasi lebih lanjut. <a href="#">pelajari selengkapnya</a></p>	
  	</div>
  </div>
  
  </div>
</div>
<?php 
	endif;
echo $output; ?>
