<?php
session_start();
if (isset($_SESSION["user"]["bukti_ngantor"])) {
    unlink($_SESSION["user"]["bukti_ngantor"]);
}
 
// Hapus session user
session_destroy();

// Redirect ke halaman login
header("Location: ./login.php");