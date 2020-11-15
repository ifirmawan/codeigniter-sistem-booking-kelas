<div class="col-md-4 col-lg-offset-4" style="padding-top: 35px;">
    
<?php if (isset($errors_log)) : ?>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $errors_log;?>
    </div>  
<?php endif; ?>
<form action="<?php echo site_url('login/create');?>" method="post"> 
  <div class="form-group">
      <label for="user_email">User name</label>
      <input type="text" class="form-control" name="user_name" placeholder="Type your realname">
  </div>
  <div class="form-group">
      <label for="user_email">No handphone</label>
      <input type="text" class="form-control" name="mhs_kontak_hp" placeholder="085726270879">
  </div>
  <div class="form-group">
      <label for="user_email">Email address</label>
      <input type="email" class="form-control" name="user_email" placeholder="141020xx">
  </div>
    <div class="form-group">
      <label for="user_pass">Password</label>
      <input type="password" class="form-control" name="user_password" placeholder="Type Your Password">
  </div>
  <div class="row">
  <div class="col-xs-6 text-right">
      <button type="reset" class="btn btn-default ">Reset</button>
      <button type="submit" class="btn btn-primary ">Sign Up</button>
  </div>
  </div>
</form>