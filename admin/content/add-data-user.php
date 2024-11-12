<?php
require_once 'controller/connection.php';
include 'controller/administrator-validation.php';

if(isset($_GET['delete'])){
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "UPDATE users SET deleted_at=1 WHERE id='$idDelete'");
    header("Location: ?pg=data-user&delete=success");
}

else if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM users WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);

    if(isset($_POST['edit'])){
        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $password = $_POST['password'] ? $_POST['password'] : $rowEdit['password'];
        $id_level = $_POST['id_level'];
        if($id_level != 2){
          $id_jurusan = "";
        } else {
          $id_jurusan = $_POST['id_jurusan'];
        }

        $queryEdit = mysqli_query($connection, "UPDATE users SET nama_lengkap='$nama_lengkap', email='$email', password='$password', id_level='$id_level', id_jurusan='$id_jurusan' WHERE id='$idEdit'");
        header("Location: ?pg=data-user&edit=success");
    }
}

else if(isset($_POST['add'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_level = $_POST['id_level'];
    if($id_level != 2){
      $id_jurusan = "";
    } else {
      $id_jurusan = $_POST['id_jurusan'];
    }

    $queryAdd = mysqli_query($connection, "INSERT INTO users (nama_lengkap, email, password, id_level, id_jurusan) VALUES ('$nama_lengkap', '$email', '$password', '$id_level', '$id_jurusan')");
    header("Location: ?pg=data-user&add=success");
}

$queryLevel = mysqli_query($connection, "SELECT * FROM levels");
$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan");
?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title"><?= isset($_GET['edit']) ? 'Edit' : 'Tambah'?> Data User</h3>
      <form action="" method="post">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label for="nama_lengkap" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama"
              value="<?= isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
              value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-control" name="id_level" id="">
              <option value=""> -- Add Level -- </option>
              <?php while ($rowLevel = mysqli_fetch_assoc($queryLevel)) : ?>
              <option value="<?= $rowLevel['id'] ?>"
                <?= isset($_GET['edit']) && ($rowLevel['id'] == $rowEdit['id_level']) ? 'selected' : '' ?>>
                <?= $rowLevel['nama_level'] ?></option>
              <?php endwhile ?>
            </select>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" class="form-label">Jurusan</label>
            <select class="form-control" name="id_jurusan" id="">
              <option value=""> -- Add Jurusan -- </option>
              <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)) : ?>
              <option value="<?= $rowJurusan['id'] ?>"
                <?= isset($_GET['edit']) && ($rowJurusan['id'] == $rowEdit['id_jurusan']) ? 'selected' : '' ?>>
                <?= $rowJurusan['nama_jurusan'] ?></option>
              <?php endwhile ?>
            </select>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" id="password" name="password" for="password"
              placeholder="Masukkan password" <?= isset($_GET['edit']) ? '' : 'required' ?>>
          </div>
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