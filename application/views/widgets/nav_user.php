<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
        <img class="media-object nav-photo" src="<?php echo base_url().'assets/images/sibuk-logo.jpg';?>" alt="default photo profile">
        </li>
        <li>
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <?php echo isset($user)? $user['user_name'] : 'Anonymous';?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Setting</a></li>
          </ul>
        </li>
        <?php if (isset($menu_items)) : 
                    foreach ($menu_items as $key => $value) {
                        if (is_array($value)) { ?>
                        <li class="nav-item btn-group">
                            <a class="nav-link dropdown-toggle" id="dropdown-<?php echo $key;?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo ucfirst($key);?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-<?php echo $key;?>">
                                <?php  foreach ($value as $k => $val) { ?>
                                    <a class="dropdown-item" href="<?php echo site_url($val);?>"><?php echo ucfirst($k);?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url($value);?>"><?php echo ucfirst($key);?></a>
                        </li>
                        <?php }
                    }
        endif;?>
      </ul>
      <form class="navbar-form navbar-right" >
        <a  href="<?php echo site_url('account/out');?>" class="btn btn-default"><i class=" glyphicon glyphicon-log-out"></i> Sign out</a>

      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>