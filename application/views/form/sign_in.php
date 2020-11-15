<div class="col-md-4 col-lg-offset-4" style="padding-top: 35px;">
  
<?php if (isset($errors_log)) : ?>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $errors_log;?>
    </div>  
<?php endif; ?>
<form action="<?php echo site_url('login/submit');?>" method="post"> 

  <div class="form-group">
    <label for="user_email">Email address</label>
    <!--<div class="input-group">-->
      <input type="email" class="form-control" name="user_email" placeholder="141020xx">
      <!--<span class="input-group-addon">@st3telkom.ac.id</span>
    </div>-->
    
  </div>
    <div class="form-group">
      <label for="user_pass">Password</label>
      <input type="password" class="form-control" name="user_pass" placeholder="Type Your Password">
  </div>
  <div class="row">
    <div class="col-xs-6">
    <div class="form-group" style="padding-left:25px ;">
      <div class="checkbox">
      <input type="checkbox"> Remember me
      </div>
    </div>

  </div>
  <div class="col-xs-6 text-right">
      <button type="reset" class="btn btn-default ">Reset</button>
      <button type="submit" class="btn btn-primary ">Sign in</button>
  </div>
  </div>
  <hr/>
  <a data-toggle="modal" data-target="#myModal">Forgot password ?</a>
      <b>Or </b> Create New Account with
      <a href="<?php echo site_url('guest/signup');?>" class="btn btn-success col-xs-12">Sign Up</a>    

</form>


<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
<form action="<?php echo site_url('login/doforget'); ?>" method="post"> 

    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset Password</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <div class="input-group">
              <input type="email" class="form-control" name="user_email" placeholder="141020xx">
              <span class="input-group-addon">@st3telkom.ac.id</span>
            </div>
          </div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
    </form>
</div>

</div>