<?php
require_once 'controller/connection.php';
include 'controller/pic-jurusan-validation.php';

if(isset($_GET['delete'])){
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "UPDATE peserta_pelatihan SET deleted_at=1 WHERE id='$idDelete'");
    header("Location: ?pg=data-pendaftaran-pelatihan&delete=success");
}

else if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM peserta_pelatihan WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);
}

$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan");
$queryGelombang = mysqli_query($connection, "SELECT * FROM gelombang");
?>

<div class="wrapper">
  <div class="card mt-3 me-5 ms-5">
    <div class="card-body">
      <h3 class="card-title">Detail Calon Peserta Pelatihan</h3>
      <img
        src="<?= isset($_GET['edit']) && !empty($rowEdit['photo']) ? 'img/foto_peserta/' . $rowEdit['photo'] : 'https://placehold.co/100' ?>"
        width="150" alt="" class="mt-3">
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" disabled="true">
              <option value=""> -- Add Status -- </option>
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
            <label for="id_jurusan" class="form-label">Jurusan</label>
            <select name="id_jurusan" id="" class="form-control" disabled="true">
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
            <select name="id_gelombang" id="" class="form-control" disabled="true">
              <option value=""> -- Pilih Jurusan -- </option>
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
              value="<?= isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK"
              value="<?= isset($_GET['edit']) ? $rowEdit['nik'] : '' ?>" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="kartu_keluarga" class="form-label">Kartu Keluarga</label>
            <input type="number" class="form-control" id="kartu_keluarga" name="kartu_keluarga"
              placeholder="Masukkan kartu keluarga"
              value="<?= isset($_GET['edit']) ? $rowEdit['kartu_keluarga'] : '' ?>" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" disabled="true">
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
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
              placeholder="Masukkan Tanggal Lahir" value="<?= isset($_GET['edit']) ? $rowEdit['tanggal_lahir'] : '' ?>"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir"
              placeholder="Masukkan Pendidikan Terakhir"
              value="<?= isset($_GET['edit']) ? $rowEdit['pendidikan_terakhir'] : '' ?>" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
              placeholder="Masukkan Nama Sekolah" value="<?= isset($_GET['edit']) ? $rowEdit['nama_sekolah'] : '' ?>"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="kejuruan" class="form-label">Kejuruan</label>
            <input type="text" class="form-control" id="kejuruan" name="kejuruan" placeholder="Masukkan Kejuruan"
              value="<?= isset($_GET['edit']) ? $rowEdit['kejuruan'] : '' ?>" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nomor_hp" class="form-label">Nomor Telephone</label>
            <input type="number" class="form-control" id="nomor_hp" name="nomor_hp"
              placeholder="Masukkan Nomor Telephone" value="<?= isset($_GET['edit']) ? $rowEdit['nomor_hp'] : '' ?>"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
              value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="aktivitas_saat_ini" class="form-label">Aktivitas Saat Ini</label>
            <input type="text" class="form-control" id="aktivitas_saat_ini" name="aktivitas_saat_ini"
              placeholder="Masukkan Aktifitas Saat Ini"
              value="<?= isset($_GET['edit']) ? $rowEdit['aktivitas_saat_ini'] : '' ?>" readonly>
          </div>
          <!-- <div class="col-sm-6 mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo" readonly>
          </div> -->
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>">
              <?php echo isset($_GET['edit']) ? 'Atur' : 'Tambah' ?>
            </button>
          </div>
      </form>
    </div>
  </div>
</div>