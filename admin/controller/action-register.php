<?php
require_once 'connection.php';

if(isset($_POST['register'])){
    $id_level = $_POST['id_level'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($id_level != 2){
      $queryRegister = mysqli_query($connection, "INSERT INTO users (id_level, nama_lengkap, email, password) VALUES ('$id_level', '$nama_lengkap', '$email', '$password')");
    } else {
      $idJurusan = $_POST['id_jurusan'];
      $queryRegister = mysqli_query($connection, "INSERT INTO users (id_level, id_jurusan, nama_lengkap, email, password) VALUES ('$id_level', '$idJurusan', '$nama_lengkap', '$email', '$password')");
    }


    if($queryRegister){
      // echo "<script>alert('Register Berhasil')</script>";
      header("Location: ../login.php");
    }
}