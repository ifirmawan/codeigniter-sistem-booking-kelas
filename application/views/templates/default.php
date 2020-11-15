<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo (isset($title))? $title : 'Sibuk keles' ;?></title>
<?php echo (isset($render_css))? $render_css : '';?>
<?php 
  if (isset($css_files) && isset($js_files)) :
  foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
  <script src="<?php echo $file; ?>"></script>
<?php endforeach; 
  endif;
?>
<style type="text/css">
    div.flexigrid .btn-primary a {
      color: #fff;
    }
    .sibuk-nav>li>a {
      border: 1px solid #eee;
    }
</style>
</head>
<body >
<?php echo (isset($navbar_top))? $navbar_top : '' ;?>

<?php if(isset($errors_log)) :?>
<div class="alert alert-warning alert-dismissable" style="margin-top:50px;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> <?php echo $errors_log;?>
</div>
<?php endif;?>
<?php if(isset($suck_log)) :?>
<div class="alert alert-success alert-dismissable" style="margin-top:50px;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Awesome!</strong> <?php echo $suck_log;?>
</div>
<?php endif;?>


<div class="container" <?php echo (isset($errors_log) || isset($suck_log))? '' : 'style="padding-top: 65px;"';?>>
	
  	<?php echo $this->template->content; ?>    

</div>

<span class="site_url" style="display: none;"><?php echo site_url('json/');?></span>
<span class="user_name" style="display: none;"><?php echo (isset($user))? $user['user_name'] : '';?></span>
<?php echo (isset($render_js))? $render_js : '';?>
</body>
</html>
