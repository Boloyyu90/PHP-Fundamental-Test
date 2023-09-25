<?php
session_start();

if (isset($_POST["hapus"])) {
  $_SESSION["berhasil"] = "Berhasil menghapus data " . $_SESSION['layanan'][$_POST["index"]]["nama"];
  unset($_SESSION["Layanan"][$_POST["index"]]);
  header("Location: ./dashboard.php");
}
