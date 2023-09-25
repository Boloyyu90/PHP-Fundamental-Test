<?php

session_start();

if (isset($_POST['tambahLayanan'])) {
  if (!isset($_SESSION['Layanan'])) {
    $_SESSION['Layanan'] = [];
  }
  $arrayLayanan = array();
  $arrayLayanan['nama'] = $_POST['namaLayanan'];
  $arrayLayanan['deskripsi'] = $_POST['deskripsi'];
  $arrayLayanan['satuanLayanan'] = $_POST['satuanLayanan'];
  $arrayLayanan['harga'] = $_POST['harga'];

  array_push($_SESSION["Layanan"], $arrayLayanan);
  $_SESSION["berhasil"] = "Berhasil menyimpan data " . $arrayLayanan['nama'];
  header("Location: ./dashboard.php");
}
