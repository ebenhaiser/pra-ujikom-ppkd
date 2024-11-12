<?php
require_once 'controller/connection.php';
include 'controller/administrator-validation.php';

if(isset($_GET['delete'])){
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "UPDATE jurusan SET deleted_at=1 WHERE id='$idDelete'");
    header("Location: ?pg=data-jurusan&delete=success");
}

else if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM jurusan WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);

    if(isset($_POST['edit'])){
        $nama_jurusan =$_POST['nama_jurusan'];

        $queryEdit = mysqli_query($connection, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id='$idEdit'");
        header("Location: ?pg=data-jurusan&edit=success");
    }
}

else if(isset($_POST['add'])){
    $nama_jurusan =$_POST['nama_jurusan'];


    $queryAdd = mysqli_query($connection, "INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan')");
    header("Location: ?pg=data-jurusan&add=success");
}
?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title"><?= isset($_GET['edit']) ? 'Edit' : 'Tambah'?> Data Jurusan</h3>
      <form action="" method="post">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan nama"
              value="<?= isset($_GET['edit']) ? $rowEdit['nama_jurusan'] : '' ?>" required>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>">
              <?php echo isset($_GET['edit']) ? 'Atur' : 'Tambah' ?>
            </button>
          </div>
      </form>
    </div>
  </div>
</div>