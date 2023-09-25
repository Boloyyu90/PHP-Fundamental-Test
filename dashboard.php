<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Admin Panel - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $detail["page_title"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Icon tab -->
    <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon" />

    <!-- Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <!-- Poppins dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./assets/css/poppins.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />

    <style>
        .img-bukti-ngantor {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header class="fixed-top scrolled" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo" />
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </nav>
    </header>


    <main style="padding-top: 84px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Dashboard</h1>

        <?php if (isset($_SESSION["berhasil"])) { ?>
            <div class="alert alert-success mb-4 text-center" role="alert">
                <strong>Berhasil!</strong><?php echo $_SESSION["berhasil"];
                                        }
                                        unset($_SESSION["berhasil"]); ?>
            </div>

            <div class="row">
                <div class="col-lg-10">
                    <div class="card card-body h-100 justify-content-center">
                        <h4>Selamat datang,</h4>
                        <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>

                        <p class="mb-0">Kamu sudah login sejak:</p>
                        <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"]; ?> </p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card card-body">
                        <p>Bukti sedang ngantor:</p>
                        <img src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>" class="img-fluid rounded img-bukti-ngantor" alt="Bukti ngantor (sudah dihapus)" />
                    </div>
                </div>
            </div>
            <h1 class="mt-5 mb-3 border-bottom fw-bold">Daftar Layanan</h1>
            <p class="mb-0">Grand Atma memiliki <strong><?php
                                                        if (!isset($_SESSION['Layanan'])) {
                                                            echo 0;
                                                        } else {
                                                            echo count($_SESSION['Layanan']);
                                                        }
                                                        ?></strong> fasilitas dan layanan yang dapat digunakan customer</p>
            <a class="btn btn-primary" href="tambahLayanan.php" role="button" style="margin-top: 10px;">Tambah Layanan</a>

            <?php
            if (isset($_SESSION['Layanan'])) {
                foreach ($_SESSION['Layanan'] as $key => $value) { ?>
                    <form action="./processDelete.php" method="post">
                        <div class="card card-body h-100 justify-content-center my-3" method="post">>
                            <input type="text" value="<?php echo $key ?>" name="index" hidden>
                            <input type="text" name="hapusLayanan" hidden>
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <?php if ($key % 3 == 0) { ?>
                                        <img src="./assets/images/layanan-bellboy.jpg" class="img-fluid rounded-start">
                                    <?php } elseif ($key % 3 == 1) { ?>
                                        <img src="./assets/images/layanan-gym.jpg" class="img-fluid rounded-start">
                                    <?php } elseif ($key % 3 == 2) { ?>
                                        <img src="./assets/images/layanan-spa.jpg" class="img-fluid rounded-start">
                                    <?php } ?>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $value['nama'] ?></h5>
                                        <p class="card-text border-bottom pb-2 "><?php echo $value['deskripsi'] ?></p>
                                        <p class="card-text text-sm-start mt-0  ">Satuan: <strong><?php echo $value['satuanLayanan'] ?></strong>
                                            Price:<strong> Rp <?php echo $value['harga'] ?></strong></p>
                                        <button type="submit" class="btn btn-danger " name="hapus">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }

            ?>
    </main>

    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>