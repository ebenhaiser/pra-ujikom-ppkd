<?php
    require_once '../admin/controller/connection.php';

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
    $status = 0;

    $photo = $_FILES['photo']['name'];

    $ext = array('jpg', 'png', 'jpeg', 'webp', 'jfif', 'heic');
    $ext_upload = pathinfo($photo, PATHINFO_EXTENSION);

    if (!in_array($ext_upload, $ext)) {
        echo "Format file yang diperbolehkan hanya JPG, PNG, JPEG, WebP, JFIF, HEIC.";
        exit;
    }

    $new_photo_name = "fotoPeserta".$nik.".".$ext_upload;
    move_uploaded_file($_FILES['photo']['tmp_name'], "../admin/img/foto_peserta/". $new_photo_name);

    $queryPendaftara = mysqli_query($connection, "INSERT INTO peserta_pelatihan(id_jurusan, id_gelombang, nama_lengkap, nik, kartu_keluarga, jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan_terakhir, nama_sekolah, kejuruan, nomor_hp, email, aktivitas_saat_ini, status, photo) VALUES('$id_jurusan', '$id_gelombang', '$nama_lengkap', '$nik', '$kartu_keluarga', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$pendidikan_terakhir', '$nama_sekolah', '$kejuruan', '$nomor_hp', '$email', '$aktivitas_saat_ini', '$status', '$new_photo_name')");

    header("location: ../pendaftaran-selesai.php")

?>