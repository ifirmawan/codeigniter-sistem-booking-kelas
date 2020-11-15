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
        <a  href="<?php (isset($last_url) && $last_url == 'login')? $url='guest' : $url='login'; echo site_url($url);?>" class="btn btn-primary">
        <?php 
        if(isset($last_url) && $last_url =='login'):?>
          <i class=" glyphicon glyphicon-search"></i>
          &nbspSearch
        <?php else: ?>
          <i class=" glyphicon glyphicon-log-in"></i>
          &nbspSign in
        <?php endif; ?>
        </a>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>