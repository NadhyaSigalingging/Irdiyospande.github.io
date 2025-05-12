<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sidebar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <style>
    /* Reset dasar sidebar */
.main-sidebar {
  width: 230px;
  height: 100vh;
  background-color: #566A58 !important; /* WARNA UTAMA */
  color: #ffffff;
  position: fixed;
  overflow-y: auto;
  border-right: 1px solid #4f604f;
}

/* Panel user */
.user-panel {
  padding: 15px;
  display: flex;
  align-items: center;
  background-color: #6b7d6b;
  border-bottom: 1px solid #4f604f;
}
.user-panel .image img {
  width: 45px;
  height: 45px;
  border-radius: 50%;
}
.user-panel .info {
  margin-left: 10px;
}
.user-panel .info p {
  margin: 0;
  font-weight: bold;
  color: #ffffff;
}
.user-panel .info span {
  font-size: 12px;
  color: #dcdcdc;
}

/* Header menu seperti ACTIVE MENU, MASTER APPLICATION */
.sidebar-menu .header {
  color: #e3eae3;
  font-size: 12px;
  text-transform: uppercase;
  padding: 10px 15px 5px;
  font-weight: bold;
  background-color: #6b7d6b !important;
  border-top: 1px solid #4f604f;
}

/* Menu utama */
.sidebar-menu,
.treeview-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #566A58;
}
.sidebar-menu > li > a {
  display: block;
  color: #d9e6d9;
  padding: 12px 15px;
  text-decoration: none;
  background-color: #6b7d6b;
  transition: background 0.3s;
}
.sidebar-menu > li > a:hover,
.sidebar-menu > li.active > a {
  background-color: #4f604f;
  color: #ffffff;
}

.treeview-menu {
  display: none;
  background-color: #6b7d6b;
}
.treeview:hover > .treeview-menu,
.treeview.active > .treeview-menu {
  display: block;
}
.treeview-menu li a {
  padding: 10px 30px;
  display: block;
  color: #ffffff;
  text-decoration: none;
  background-color: #6b7d6b;
  transition: background 0.3s;
}
.treeview-menu li a:hover,
.treeview-menu li.active a {
  background-color: #4f604f;
  color: #ffffff;
}

.fa {
  margin-right: 8px;
}

.sidebar::after {
  content: "";
  display: block;
  height: 100px;
  background-color: #566A58;
}


  </style>
</head>
<body>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="image">
        <img src="template/images/<?php echo $_SESSION['images']; ?>" alt="User Image">
      </div>
      <div class="info">
        <p><?php echo $_SESSION['nama']; ?></p>
        <span><?php echo date('l. d M Y'); ?></span>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">Active Menu</li>
      <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      <?php if ($_SESSION['batasan'] == 1 || $_SESSION['batasan'] == 3) { ?>

      <li class="treeview">
        <a href="#"><i class="fa fa-key"></i> <span>Check In / Out</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="?module=transaksi/checkin"><i class="fa fa-circle-o"></i> Check In</a></li>
          <li><a href="?module=transaksi/checkout"><i class="fa fa-circle-o"></i> Check Out</a></li>
          <li><a href="?module=transaksi/checkin-list"><i class="fa fa-circle-o"></i> Guest In-House</a></li>
          <li><a href="?module=transaksi/status_kamar"><i class="fa fa-circle-o"></i> Status Kamar</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-pencil"></i> <span>Reservasi</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="?module=reservasi/add-reservasi"><i class="fa fa-circle-o"></i> Reservasi Kamar </a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Layanan Tambahan</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="?module=transaksi/pesan-layanan"><i class="fa fa-circle-o"></i> Layanan Tambahan</a></li>
          <li><a href="?module=kamar/kamar-kotor"><i class="fa fa-circle-o"></i> Housekeeping</a></li>
        </ul>
      </li>
        <li class="header">Master Application</li>

        <li class="treeview">
          <a href="#"><i class="fa fa-bed"></i> <span>Master Kamar</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="?module=kamar/kamar-list"><i class="fa fa-circle-o"></i> Total Kamar</a></li>
            <li><a href="?module=kamar/kamar-add"><i class="fa fa-circle-o"></i> Tambah Kamar</a></li>
            <li><a href="?module=kamar/tipe-list"><i class="fa fa-circle-o"></i> Tambah Kategori Kamar </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-cutlery"></i> <span>Master Layanan Tambahan</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="?module=layanan/layanan-list"><i class="fa fa-circle-o"></i> Layanan Tambahan Type</a></li>
            <li><a href="?module=layanan/layanan-add"><i class="fa fa-circle-o"></i> Add Layanan Tambahan</a></li>
            <li><a href="?module=layanan/kategori-list"><i class="fa fa-circle-o"></i> layanan Tambahan Category</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-suitcase"></i> <span>Database Tamu</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="?module=tamu/tamu-list"><i class="fa fa-circle-o"></i> Total Tamu</a></li>
            <li><a href="?module=tamu/tamu-add"><i class="fa fa-circle-o"></i> Tambah Tamu</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php if ($_SESSION['batasan'] == 2 || $_SESSION['batasan'] == 3) { ?>

        <li class="treeview">
          <a href="#"><i class="fa fa-exchange"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="?module=laporan/transaksi"><i class="fa fa-circle-o"></i> Check In Report</a></li>
            <li><a href="?module=laporan/transaksi-layanan"><i class="fa fa-circle-o"></i> Laporan Penjualan Layanan Tambahan</a></li>
          </ul>
        </li>
        <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Export to Excell</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="template/module/export/transaksi_checkout.php"><i class="fa fa-circle-o"></i> Laporan Penjualan Kamar</a></li>
                <li><a href="template/module/export/transaksi_layanan.php"><i class="fa fa-circle-o"></i> Laporan Penjualan Layanan Tambahan </a></li>
                <li><a href="template/module/export/layanan.php"><i class="fa fa-circle-o"></i> Layanan Tambahan</a></li>
                <li><a href="template/module/export/tipe_kamar.php"><i class="fa fa-circle-o"></i> Detail Kamar</a></li>
                <li><a href="template/module/export/tamu.php"><i class="fa fa-circle-o"></i> Laporan Daftar Tamu </a></li>
              </ul>
            </li>
        <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Master User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=user/user-list"><i class="fa fa-circle-o"></i> User</a></li>
                <li><a href="?module=user/user-add"><i class="fa fa-circle-o"></i> Add User</a></li>
              </ul>
            </li>
            <?php } ?>
      
    </ul>
  </section>
</aside>

</body>
</html>
