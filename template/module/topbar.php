<header class="main-header" style="background-color: #8EAC90;">
  <!-- Logo Sidebar -->
  <a href="index.php" class="logo" style="background-color: #8EAC90; color: #fff;">
    <!-- Mini logo for sidebar mini 50x50 -->
    <span class="logo-mini"><b>Irdiyospande</b></span>
    <!-- Regular logo for full mode -->
    <span class="logo-lg"><b>Irdiyospande</b></span>
  </a>

  <!-- Navbar -->
  <nav class="navbar navbar-static-top" role="navigation" style="background-color: #8EAC90; border: none;">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color: #fff;">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar" style="background-color: #fff;"></span>
      <span class="icon-bar" style="background-color: #fff;"></span>
      <span class="icon-bar" style="background-color: #fff;"></span>
    </a>

    <!-- Topbar Logo -->
    <a href="index.php" class="navbar-brand" style="padding: 5px 15px; color: #fff;">
      <img src="template/images/logo1.png" alt="Logo" style="height:40px; display:inline-block; vertical-align:middle; margin-right:15px;">
      <span style="vertical-align:middle; color: #fff;">
        <b><?php echo $perusahaan['nama_hotel']; ?></b>  
        <span class="small"><?php echo $perusahaan['nama_perusahaan']; ?></span>
      </span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;">
            <img src="template/images/<?php echo $_SESSION['images']; ?>" class="user-image" alt="User Image" />
            <span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header" style="background-color: #8EAC90;">
              <img src="template/images/<?php echo $_SESSION['images']; ?>" class="img-circle" alt="User Image" />
              <p>
                <?php echo $_SESSION['nama']; ?>
                <small><?php echo $_SESSION['jabatan']; ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat"></a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat">Log Out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
