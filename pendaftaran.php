<?php
require_once 'admin/controller/connection.php';
$queryGelombang = mysqli_query($connection, "SELECT * FROM gelombang WHERE aktif = 1 ORDER BY id ASC");
$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan WHERE deleted_at=0 ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran PPKD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #696cff;">
    <!-- <div class="container-fluid">
      <img src="" alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active btn" aria-current="page" href="index.php" style="color:white;">Back</a>
        </div>
      </div>
    </div> -->
  </nav>

  <div class="wrapper">
    <div class="container">
      <div class="card mt-3 mb-5 shadow">
        <div class="card-body">
          <div align="center">

            <img src="admin/img/logo/ppkd_logo.jpg" class="mt-3 mx-auto" alt="" width="100">
          </div>
          <h5 class="card-title mt-3 mb-2" align="center">Pendaftaran Peserta PPKD</h5>
          <hr>
          <form action="controller/action-pendaftaran-peserta-pelatihan.php" method="post"
            enctype="multipart/form-data">
            <div class="mb-3 form-group">
              <label for="id_gelombang" class="form-label">Gelombang:</label>
              <select name="id_gelombang" class="form-control" id="">
                <option value=""> -- Pilih Gelombang -- </option>
                <?php while($rowGelombang = mysqli_fetch_assoc($queryGelombang)) : ?>
                <option value="<?= $rowGelombang['id'] ?>"><?= $rowGelombang['nama_gelombang'] ?></option>
                <?php endwhile ?>
              </select>
            </div>
            <div class="mb-3 form-group">
              <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama"
                required>
            </div>
            <div class="mb-3 form-group">
              <label for="nik" class="form-label">NIK:</label>
              <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3 form-group">
              <label for="kartu_keluarga" class="form-label">Kartu Keluarga:</label>
              <input type="number" class="form-control" id="kartu_keluarga" name="kartu_keluarga"
                placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3 form-group">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
              <select name="jenis_kelamin" class="form-control" id="">
                <option value=""> -- Jenis Kelamin -- </option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3 form-group">
              <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                placeholder="Masukkan Tempat Lahir" required>
            </div>
            <div class="mb-3 form-group">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                placeholder="Masukkan Tanggal Lahir" required>
            </div>
            <div class="mb-3 form-group">
              <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
              <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir"
                placeholder="Masukkan Pendidikan Terakhir" required>
            </div>
            <div class="mb-3 form-group">
              <label for="nama_sekolah" class="form-label">Nama Sekolah:</label>
              <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                placeholder="Masukkan Nama Sekolah" required>
            </div>
            <div class="mb-3 form-group">
              <label for="kejuruan" class="form-label">Kejuruan:</label>
              <input type="text" class="form-control" id="kejuruan" name="kejuruan" placeholder="Masukkan Kejuruan"
                required>
            </div>
            <div class="mb-3 form-group">
              <label for="nomor_hp" class="form-label">Nomor HP:</label>
              <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor HP"
                required>
            </div>
            <div class="mb-3 form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Nomor HP" required>
            </div>
            <div class="mb-3 form-group">
              <label for="aktivitas_saat_ini" class="form-label">Aktivitas Saat Ini:</label>
              <input type="text" class="form-control" id="aktivitas_saat_ini" name="aktivitas_saat_ini"
                placeholder="Masukkan Aktivitas Saat Ini" required>
            </div>
            <div class="mb-3 form-group">
              <label for="photo" class="form-label">Foto:</label>
              <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <div class="mb-3 form-group">
              <label for="id_jurusan" class="form-label">Jurusan yang Didaftarkan:</label>
              <select name="id_jurusan" class="form-control" id="">
                <option value=""> -- Jurusan yang Didaftarkan -- </option>
                <?php while($rowJurusan = mysqli_fetch_assoc($queryJurusan)) : ?>
                <option value="<?= $rowJurusan['id'] ?>"><?= $rowJurusan['nama_jurusan']?></option>
                <?php endwhile ?>
              </select>
            </div>
            <button class="btn" style="background-color: #696cff; color: white;" name="submit"
              type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>