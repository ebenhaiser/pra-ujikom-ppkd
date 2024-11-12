<?php

$connection = mysqli_connect("localhost", "root", "", "angkatan3_pra_ujikom");

if(!$connection){
    echo "gagal konak, eh konek";
    die;
}