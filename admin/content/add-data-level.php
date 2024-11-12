<?php
require_once 'controller/connection.php';
include 'controller/administrator-validation.php';

if(isset($_GET['delete'])){
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "UPDATE levels SET deleted_at=1 WHERE id='$idDelete'");
    header("Location: ?pg=data-level&delete=success");
}

else if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM levels WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);

    if(isset($_POST['edit'])){
        $nama_level =$_POST['nama_level'];

        $queryEdit = mysqli_query($connection, "UPDATE levels SET nama_level='$nama_level' WHERE id='$idEdit'");
        header("Location: ?pg=data-level&edit=success");
    }
}

else if(isset($_POST['add'])){
    $nama_level =$_POST['nama_level'];

    $queryAdd = mysqli_query($connection, "INSERT INTO levels (nama_level) VALUES ('$nama_level')");
    header("Location: ?pg=data-level&add=success");
}
?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title"><?= isset($_GET['edit']) ? 'Edit' : 'Tambah'?> Data Level</h3>
      <form action="" method="post">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label for="nama_Level" class="form-label">Nama Level</label>
            <input type="text" class="form-control" id="nama_level" name="nama_level" placeholder="Masukkan nama"
              value="<?= isset($_GET['edit']) ? $rowEdit['nama_level'] : '' ?>" required>
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