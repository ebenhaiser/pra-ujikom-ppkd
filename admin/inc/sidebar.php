<?php 
require_once 'controller/connection.php';
$idNavbarUser = $_SESSION['id'];
$queryNavbarUser = mysqli_query($connection, "SELECT * FROM users WHERE id = '$idNavbarUser'");
$rowNavbarUser = mysqli_fetch_assoc($queryNavbarUser);
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo gap-1">
    <img src="img/logo/ppkd_logo.jpg" alt="" width="30px"><br><br>
    <span class="demo text-body fw-bolder" style="font-size: 25px;">Admin PPKD</span>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item <?= !isset($_GET['pg']) || $_GET['pg'] == 'dashboard' ? 'active' : '' ?>">
      <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <?php if($rowNavbarUser['id_level'] == 1) : ?>
    <!-- ADMIN APLIKASI -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Admin aplikasi</span>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-pendaftaran-pelatihan' || $_GET['pg'] == 'add-data-pendaftaran-pelatihan')) ? 'active' : '' ?>">
      <a href="?pg=data-pendaftaran-pelatihan" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-checks"
          viewBox="0 0 16 16">
          <path
            d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
        </svg>
        <div data-i18n="Analytics">Daftar Pendaftaran Pelatihan</div>
      </a>
    </li>
    <!-- END ADMIN APLIKASI -->

    <?php elseif($rowNavbarUser['id_level'] == 2) : ?>
    <!-- PIC Jurusan -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">PIC Jurusan</span>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-calon-peserta-pelatihan' || $_GET['pg'] == 'add-data-calon-peserta-pelatihan')) ? 'active' : '' ?>">
      <a href="?pg=data-calon-peserta-pelatihan" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill"
          viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
        <div data-i18n="Analytics">Calon Peserta Pelatihan</div>
      </a>
    </li>
    <!-- <li class="menu-item">
      <a href="?pg=informasi-jadwal-tes" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Informasi Jadwal Tes</div>
      </a>
    </li> -->
    <!-- END PIC Jurusan -->

    <?php elseif ($rowNavbarUser['id_level'] == 3) : ?>
    <!-- Administrator -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Administrator</span>
    </li>
    <li class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-user' || $_GET['pg'] == 'add-data-user')) ? 'active' : '' ?>
">
      <a href="?pg=data-user" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person"
          viewBox="0 0 16 16">
          <path
            d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
          <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
        <div data-i18n="Account">Data User</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-pendaftar' || $_GET['pg'] == 'add-data-pendaftar')) ? 'active' : '' ?>">
      <a href="?pg=data-pendaftar" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
          viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
          <path fill-rule="evenodd"
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
        </svg>
        <div data-i18n="Account">Data Pendaftar</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-gelombang' || $_GET['pg'] == 'add-data-gelombang')) ? 'active' : '' ?>">
      <a href="?pg=data-gelombang" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-water"
          viewBox="0 0 16 16">
          <path
            d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65" />
        </svg>
        <div data-i18n="Notifications">Data Gelombang</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-jurusan' || $_GET['pg'] == 'add-data-jurusan')) ? 'active' : '' ?>">
      <a href="?pg=data-jurusan" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
          <path
            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
          <path
            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
        </svg>
        <div data-i18n="Connections">Data Jurusan</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'data-level' || $_GET['pg'] == 'add-data-level')) ? 'active' : '' ?>">
      <a href="?pg=data-level" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-postage-fill"
          viewBox="0 0 16 16">
          <path d="M4.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z" />
          <path
            d="M3.5 1a1 1 0 0 0 1-1h1a1 1 0 0 0 2 0h1a1 1 0 0 0 2 0h1a1 1 0 1 0 2 0H15v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1h-1.5a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0H1v-1a1 1 0 1 0 0-2v-1a1 1 0 1 0 0-2V9a1 1 0 1 0 0-2V6a1 1 0 0 0 0-2V3a1 1 0 0 0 0-2V0h1.5a1 1 0 0 0 1 1M3 3v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1" />
        </svg>
        <div data-i18n="Connections">Data Level</div>
      </a>
    </li>
      
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Recycle Bin</span>
    </li>
    <li class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'recycle-bin-data-user' || $_GET['pg'] == 'restore-data-user')) ? 'active' : '' ?>
">
      <a href="?pg=recycle-bin-data-user" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person"
          viewBox="0 0 16 16">
          <path
            d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
          <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
        <div data-i18n="Account">Restore Data User</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'recycle-bin-data-pendaftar' || $_GET['pg'] == 'restore-data-pendaftar')) ? 'active' : '' ?>">
      <a href="?pg=recycle-bin-data-pendaftar" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
          viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
          <path fill-rule="evenodd"
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
        </svg>
        <div data-i18n="Account">Restore Data Pendaftar</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'recycle-bin-data-gelombang' || $_GET['pg'] == 'restore-data-gelombang')) ? 'active' : '' ?>">
      <a href="?pg=recycle-bin-data-gelombang" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-water"
          viewBox="0 0 16 16">
          <path
            d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65" />
        </svg>
        <div data-i18n="Notifications">Restore Data Gelombang</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'recycle-bin-data-jurusan' || $_GET['pg'] == 'restore-data-jurusan')) ? 'active' : '' ?>">
      <a href="?pg=recycle-bin-data-jurusan" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
          <path
            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
          <path
            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
        </svg>
        <div data-i18n="Connections">Restore Data Jurusan</div>
      </a>
    </li>
    <li
      class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'recycle-bin-data-level' || $_GET['pg'] == 'restore-data-level')) ? 'active' : '' ?>">
      <a href="?pg=recycle-bin-data-level" class="menu-link gap-3">
        <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-postage-fill"
          viewBox="0 0 16 16">
          <path d="M4.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z" />
          <path
            d="M3.5 1a1 1 0 0 0 1-1h1a1 1 0 0 0 2 0h1a1 1 0 0 0 2 0h1a1 1 0 1 0 2 0H15v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1h-1.5a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0H1v-1a1 1 0 1 0 0-2v-1a1 1 0 1 0 0-2V9a1 1 0 1 0 0-2V6a1 1 0 0 0 0-2V3a1 1 0 0 0 0-2V0h1.5a1 1 0 0 0 1 1M3 3v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1" />
        </svg>
        <div data-i18n="Connections">Restore Data Level</div>
      </a>
    </li>

    <!-- END Administrator -->
    <?php endif ?>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Links</span>
    </li>
    <li class="menu-item">
      <a href="../index.php" target="_blank" class="menu-link gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree-fill"
          viewBox="0 0 16 16">
          <path
            d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777z" />
        </svg>
        <div data-i18n="Connections">Link Tree</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="../pendaftaran.php" target="_blank" class="menu-link gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-person-plus-fill" viewBox="0 0 16 16">
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
          <path fill-rule="evenodd"
            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
        </svg>
        <div data-i18n="Account">Link Pendaftaran</div>
      </a>
    </li>

    </a>
    </li>
  </ul>
</aside>