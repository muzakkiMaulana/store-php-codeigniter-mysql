<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">TOKO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- menu -->   
        <?php 
          foreach($menu as $row_menu):
            if($row_menu->sub_menu == 0) {
        ?>
          <ul class="navbar-nav mr-2">
            <li class="navbar-item <?php if($this->uri->segment(1)== $row_menu->url ){echo "active";} ?>">
              <a class="nav-link" href="<?=base_url(), $row_menu->url;?>"><?=$row_menu->menu;?></a>
            </li>
          </ul>
        <?php
          } elseif ($row_menu->sub_menu == 1) {
        ?>
          <ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$row_menu->menu;?>
              </a>
                <div class="dropdown-menu border border-0" aria-labelledby="navbarDropdown">
                  <?php foreach($sub_menu as $row_submenu): 
                    if($row_menu->id == $row_submenu->id_menu): ?>
                    <a class="dropdown-item" href="#"><?=$row_submenu->sub_menu;?></a>
                  <?php 
                  endif;
                  endforeach; ?>
                </div>
            </li>
          </ul>
        <?php
        }
        endforeach;
        ?>
    </div>

<ul class="navbar-nav border-left">
<?php if($this->session->userdata('email') == NULL) { ?>
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      Login <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <form class="px-4 py-3" method="POST" action="<?= base_url('auth') ?>">
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Email address</label>
            <input type="email" name="email"class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="dropdownCheck">
              <label class="form-check-label" for="dropdownCheck">
                Remember me
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">New around here? Sign up</a>
        <a class="dropdown-item" href="#">Forgot password?</a>
      </div>
   </li>
   <?php } elseif(count($this->session->userdata()) > 1) { ?>
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       <?= $user['name'] ?> <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
      </div>
    </li>

   <?php } ?>
  
</ul>

</div> <!-- /.container-fluid -->
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
</nav>