<?php
include 'connection.php';
session_start();
session_regenerate_id();

if (empty($_SESSION)) {
  header("Location: logout.php");
}


$queryinstructors = mysqli_query($connection, "SELECT * FROM instructors");

// BUAT DELETE USER
if(isset($_GET['delete'])) {
$id = $_GET['delete'];

$queryDelete = mysqli_query($connection, "DELETE FROM instructors WHERE id = '$id'");
header('Location: instructor.php');

};
// BUAT ADD USER
if(isset($_POST['add'])) {
$instructor_name = $_POST['instructor_name'];
$instructor_major = $_POST['instructor_major'];

// $_POST  : from input name=''
// $_GET   : url ?param=''
// $_FILES : ambil nilai dari input type file
if(isset($_FILES['photo']['name'])) {
  $img_name = $_FILES['photo']['name'];
  $img_size = $_FILES['photo']['size'];

  $ext = array('png', 'jpg', 'jpeg');
  $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);

  // JIKA EXTENSI FOTO TIDAK ADA EXT YANG TERDAFTAR DI ARRAY EXT
  if(!in_array($img_ext, $ext)) {
    echo "Upload failed, photo extension does not match requirement";
    die;
  } else {
    // pindahkan gambar dari tmp 
    move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $img_name);
    $queryInsert = mysqli_query($connection, "INSERT INTO instructors(instructor_name, instructor_major, photo) VALUES ('$instructor_name', '$instructor_major', '$img_name')");
  };
} else {
  $queryInsert = mysqli_query($connection, "INSERT INTO instructors(instructor_name, instructor_major) VALUES ('$instructor_name', '$instructor_major')");
};

header('location: instructor.php?add=success');
};


// BUAT EDIT USER
if(isset($_GET['edit'])) {
$id = $_GET['edit'];
$queryEdit = mysqli_query($connection, "SELECT * FROM instructors WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);
}

if(isset($_POST['edit'])) {
  $instructor_name = $_POST['instructor_name'];
  $instructor_major = $_POST['instructor_major'];
// $password = $_POST['password'] ? $_POST['password'] : $rowEdit['password'];

// if($_POST['password']){
// $password = $_POST['password'];
// } else {
// $password = $rowEdit['password'];
// }

// Jika user ingin memasukkan gambar
  if(isset($_FILES['photo']['name'])) {
    $img_name = $_FILES['photo']['name'];
    $img_size = $_FILES['photo']['size'];

    $ext = array('png', 'jpg', 'jpeg');
    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);

    if(!in_array($img_ext, $ext)){
      echo "Upload failed, photo extension does not match requirement";
      die;
    } else {
      unlink('upload/' . $rowEdit['photo']);
      move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $img_name);

      // coding ubah/update disini
      $updateUser = mysqli_query($connection, "UPDATE instructors SET instructor_name='$instructor_name', photo='$img_name', instructor_major='$instructor_major' WHERE id='$id' ");
    }
    
  } else {
    // kondisi kalo user tidak ingin memasukkan gambar
    $updateUser = mysqli_query($connection, "UPDATE instructors SET instructor_name='$instructor_name', instructor_major='$instructor_major' WHERE id='$id' ");
  }

  header('location: instructor.php?edit=success');
}

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <?php include 'inc/head.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'inc/sidebar.php'; ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'inc/nav.php'; ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header"><strong><?php echo isset($_GET['edit']) ? 'Edit' : 'Add'?> Instructor</strong></div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                          <div class="mb-3 row">
                                            <div class="col-sm-6 ">
                                              <label for="">Nama Instructor : </label>
                                              <input type="text" class="form-control" name="instructor_name" placeholder="Masukkan nama instruktur" value="<?php echo isset($_GET['edit']) ? $rowEdit['instructor_name'] : '' ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                              <label for="">Jurusan : </label>
                                              <input type="text" class="form-control" name="instructor_major" placeholder="Masukkan jurusan instruktur" value="<?php echo isset($_GET['edit']) ? $rowEdit['instructor_major'] : '' ?>" required>
                                            </div>
                                          </div>
                                          <div class="mb-3 row">
                                            <div class="col-sm-6">
                                              <label for="">Profile Picture : </label>
                                              <input type="file" class="form-control" name="photo">
                                              <style>
                                                  .logo-website-settings-upload {
                                                      border-radius: 10px;
                                                      border: solid 1px black;
                                                      width: 100%;
                                                  }
                                              </style>
                                              <?php if(isset($_GET['edit'])) : ?>
                                              <img class="logo-website-settings-upload mt-3" src="upload/<?php echo isset($rowEdit['photo']) ? $rowEdit['photo'] : '' ?>" alt="">
                                              <?php endif ?>
                                            </div>
                                          </div>
                                          <div class="mb-3">
                                            <button class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>" type="submit">
                                              Save
                                            </button>
                                          </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                            <div>
                                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                                <a
                                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank"
                                    class="footer-link me-4">Documentation</a>

                                <a
                                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank"
                                    class="footer-link me-4">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/admin/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/admin/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>