<?php
require_once 'controller/connection.php';
include 'controller/administrator-validation.php';

if(isset($_GET['delete'])){
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "UPDATE gelombang SET deleted_at=1 WHERE id='$idDelete'");
    header("Location: ?pg=data-gelombang&delete=success");
}

else if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM gelombang WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);

    if(isset($_POST['edit'])){
        $nama_gelombang =$_POST['nama_gelombang'];
        $aktif = $_POST['aktif'];

        $queryEdit = mysqli_query($connection, "UPDATE gelombang SET nama_gelombang='$nama_gelombang', aktif='$aktif' WHERE id='$idEdit'");
        header("Location: ?pg=data-gelombang&edit=success");
    }
}

else if(isset($_POST['add'])){
    $nama_gelombang =$_POST['nama_gelombang'];
    $aktif = $_POST['aktif'];

    $queryAdd = mysqli_query($connection, "INSERT INTO gelombang (nama_gelombang, aktif) VALUES ('$nama_gelombang', '$aktif')");
    header("Location: ?pg=data-gelombang&add=success");
}
?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title"><?= isset($_GET['edit']) ? 'Edit' : 'Tambah'?> Data Gelombang</h3>
      <form action="" method="post">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label for="nama_gelombang" class="form-label">Nama Gelombang</label>
            <input type="text" class="form-control" id="nama_gelombang" name="nama_gelombang"
              placeholder="Masukkan nama" value="<?= isset($_GET['edit']) ? $rowEdit['nama_gelombang'] : '' ?>"
              required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama_gelombang" class="form-label">Nama Gelombang</label>
            <select name="aktif" class="form-control" id="">
              <!-- <option value=""> -- status aktif -- </option> -->
              <option value="0" <?php echo isset($_GET['edit']) && $rowEdit['aktif'] == 0 ? 'selected' : '' ?>>Tidak
                Aktif</option>
              <option value="1" <?php echo isset($_GET['edit']) && $rowEdit['aktif'] == 1 ? 'selected' : '' ?>>Aktif
              </option>
            </select>
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