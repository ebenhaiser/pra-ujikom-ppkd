<?php
require_once 'controller/connection.php';
include 'controller/administrator-validation.php';

if(isset($_GET['delete'])){
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "UPDATE peserta_pelatihan SET deleted_at=1 WHERE id='$idDelete'");
    header("Location: ?pg=data-pendaftar&delete=success");
}

else if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM peserta_pelatihan WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);

    if(isset($_POST['edit'])){
      $id_jurusan = $_POST['id_jurusan'];
      $id_gelombang = $_POST['id_gelombang'];
      $nama_lengkap = $_POST['nama_lengkap'];
      $nik = $_POST['nik'];
      $kartu_keluarga = $_POST['kartu_keluarga'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $tempat_lahir = $_POST['tempat_lahir'];
      $tanggal_lahir = $_POST['tanggal_lahir'];
      $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
      $nama_sekolah = $_POST['nama_sekolah'];
      $kejuruan = $_POST['kejuruan'];
      $nomor_hp = $_POST['nomor_hp'];
      $email = $_POST['email'];
      $aktivitas_saat_ini = $_POST['aktivitas_saat_ini'];
      $status = $_POST['status'];

      if(!empty($_FILES['photo']['name'])){
        $image_name = $_FILES['photo']['name'];
  
        $ext = array('jpg','jpeg','png', 'jfif', 'webp', 'heic');
        $extImage = pathinfo($image_name, PATHINFO_EXTENSION);
  
        if(!in_array($extImage, $ext)){
          header("Location: ?pg=add-data-pendaftar&error=ext");
        } else {
          unlink('img/foto_peserta/' . $rowEdit['photo']);
          $new_image_name = "foto_peserta".$nik.".".$extImage;
          move_uploaded_file($_FILES['photo']['tmp_name'], 'img/foto_peserta/' . $new_image_name);
          $queryAdd = mysqli_query($connection, "UPDATE peserta_pelatihan SET id_jurusan='$id_jurusan', id_gelombang='$id_gelombang', nama_lengkap='$nama_lengkap', nik='$nik', kartu_keluarga='$kartu_keluarga', jenis_kelamin='$jenis_kelamin',  tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', pendidikan_terakhir='$pendidikan_terakhir', nama_sekolah='$nama_sekolah', kejuruan='$kejuruan', nomor_hp='$nomor_hp', email='$email', aktivitas_saat_ini='$aktivitas_saat_ini', status='$status', photo='$new_image_name' WHERE id='$idEdit'");
        } 
      } else {
        $queryAdd = mysqli_query($connection, "UPDATE peserta_pelatihan SET id_jurusan='$id_jurusan', id_gelombang='$id_gelombang', nama_lengkap='$nama_lengkap', nik='$nik', kartu_keluarga='$kartu_keluarga', jenis_kelamin='$jenis_kelamin',  tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', pendidikan_terakhir='$pendidikan_terakhir', nama_sekolah='$nama_sekolah', kejuruan='$kejuruan', nomor_hp='$nomor_hp', email='$email', aktivitas_saat_ini='$aktivitas_saat_ini', status='$status' WHERE id='$idEdit'");
      }
      header("Location: ?pg=data-pendaftar&add=success");
  }
}

else if(isset($_POST['add'])){
    $id_jurusan = $_POST['id_jurusan'];
    $id_gelombang = $_POST['id_gelombang'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $kartu_keluarga = $_POST['kartu_keluarga'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $kejuruan = $_POST['kejuruan'];
    $nomor_hp = $_POST['nomor_hp'];
    $email = $_POST['email'];
    $aktivitas_saat_ini = $_POST['aktivitas_saat_ini'];
    $status = $_POST['status'];

    if(!empty($_FILES['photo']['name'])){
      $image_name = $_FILES['photo']['name'];

      $ext = array('jpg','jpeg','png', 'jfif', 'webp', 'heic');
      $extImage = pathinfo($image_name, PATHINFO_EXTENSION);

      if(!in_array($extImage, $ext)){
        header("Location: ?pg=add-data-pendaftar&error=ext");
      } else {
        $new_image_name = "foto_peserta".$nik.".".$extImage;
        move_uploaded_file($_FILES['photo']['tmp_name'], 'img/foto_peserta/' . $new_image_name);
        $queryAdd = mysqli_query($connection, "INSERT INTO peserta_pelatihan ( id_jurusan, id_gelombang, nama_lengkap, nik, kartu_keluarga, jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan_terakhir, nama_sekolah, kejuruan, nomor_hp, email, aktivitas_saat_ini, status, photo ) VALUES ( '$id_jurusan', '$id_gelombang', '$nama_lengkap', '$nik', '$kartu_keluarga', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$pendidikan_terakhir', '$nama_sekolah', '$kejuruan', '$nomor_hp', '$email', '$aktivitas_saat_ini', '$status', '$new_image_name' )");
      } 
    } else {
      $queryAdd = mysqli_query($connection, "INSERT INTO peserta_pelatihan ( id_jurusan, id_gelombang, nama_lengkap, nik, kartu_keluarga, jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan_terakhir, nama_sekolah, kejuruan, nomor_hp, email, aktivitas_saat_ini, status) VALUES ( '$id_jurusan', '$id_gelombang', '$nama_lengkap', '$nik', '$kartu_keluarga', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$pendidikan_terakhir', '$nama_sekolah', '$kejuruan', '$nomor_hp', '$email', '$aktivitas_saat_ini', '$status')");
    }
  header("Location: ?pg=data-pendaftar&add=success");
}

$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan");
$queryGelombang = mysqli_query($connection, "SELECT * FROM gelombang");
?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title"><?= isset($_GET['edit']) ? 'Edit' : 'Tambah'?> Data Pendaftar</h3>
      <img
        src="<?= isset($_GET['edit']) && !empty($rowEdit['photo']) ? 'img/foto_peserta/' . $rowEdit['photo'] : 'https://placehold.co/100' ?>"
        width="150" alt="" class="mt-3">
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label for="id_jurusan" class="form-label">Jurusan</label>
            <select name="id_jurusan" id="" class="form-control">
              <option value=""> -- Pilih Jurusan -- </option>
              <?php while($rowJurusan = mysqli_fetch_assoc($queryJurusan)) : ?>
              <option value="<?= $rowJurusan['id'] ?>"
                <?= isset($rowEdit['id_jurusan']) && $rowEdit['id_jurusan'] == $rowJurusan['id'] ? 'selected' : ''?>>
                <?= $rowJurusan['nama_jurusan'] ?>
              </option>
              <?php endwhile ?>
            </select>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="id_gelombang" class="form-label">Gelombang</label>
            <select name="id_gelombang" id="" class="form-control">
              <option value=""> -- Pilih Gelombang -- </option>
              <?php while($rowGelombang = mysqli_fetch_assoc($queryGelombang)) : ?>
              <option value="<?= $rowGelombang['id'] ?>"
                <?= isset($rowEdit['id_gelombang']) && $rowEdit['id_gelombang'] == $rowGelombang['id'] ? 'selected' : ''?>>
                <?= $rowGelombang['nama_gelombang'] ?>
              </option>
              <?php endwhile ?>
            </select>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama_lengkap" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama"
              value="<?= isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK"
              value="<?= isset($_GET['edit']) ? $rowEdit['nik'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="kartu_keluarga" class="form-label">Kartu Keluarga</label>
            <input type="number" class="form-control" id="kartu_keluarga" name="kartu_keluarga"
              placeholder="Masukkan kartu keluarga"
              value="<?= isset($_GET['edit']) ? $rowEdit['kartu_keluarga'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
              <option value=""> -- Jenis Kelamin -- </option>
              <option value="Laki-laki"
                <?= isset($_GET['edit']) && $rowEdit['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki
              </option>
              <option value="Perempuan"
                <?= isset($_GET['edit']) && $rowEdit['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan
              </option>
            </select>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
              placeholder="Masukkan Tempat Lahir" value="<?= isset($_GET['edit']) ? $rowEdit['tempat_lahir'] : '' ?>"
              required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
              placeholder="Masukkan Tanggal Lahir" value="<?= isset($_GET['edit']) ? $rowEdit['tanggal_lahir'] : '' ?>"
              required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir"
              placeholder="Masukkan Pendidikan Terakhir"
              value="<?= isset($_GET['edit']) ? $rowEdit['pendidikan_terakhir'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
              placeholder="Masukkan Nama Sekolah" value="<?= isset($_GET['edit']) ? $rowEdit['nama_sekolah'] : '' ?>"
              required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="kejuruan" class="form-label">Kejuruan</label>
            <input type="text" class="form-control" id="kejuruan" name="kejuruan" placeholder="Masukkan Kejuruan"
              value="<?= isset($_GET['edit']) ? $rowEdit['kejuruan'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nomor_hp" class="form-label">Nomor Telephone</label>
            <input type="number" class="form-control" id="nomor_hp" name="nomor_hp"
              placeholder="Masukkan Nomor Telephone" value="<?= isset($_GET['edit']) ? $rowEdit['nomor_hp'] : '' ?>"
              required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
              value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="aktivitas_saat_ini" class="form-label">Aktifitas Saat Ini</label>
            <input type="text" class="form-control" id="aktivitas_saat_ini" name="aktivitas_saat_ini"
              placeholder="Masukkan Aktifitas Saat Ini"
              value="<?= isset($_GET['edit']) ? $rowEdit['aktivitas_saat_ini'] : '' ?>" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
              <option value=""> -- Add Status -</option>
              <option value="0" <?= isset($_GET['edit']) && $rowEdit['status'] == 0 ? 'selected' : '' ?>>Pending
              </option>
              <option value="1" <?= isset($_GET['edit']) && $rowEdit['status'] == 1 ? 'selected' : '' ?>>Wawancara
              </option>
              <option value="2" <?= isset($_GET['edit']) && $rowEdit['status'] == 2 ? 'selected' : '' ?>>Lolos
              </option>
              <option value="3" <?= isset($_GET['edit']) && $rowEdit['status'] == 3 ? 'selected' : '' ?>>Tidak Lolos
              </option>

            </select>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo">
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