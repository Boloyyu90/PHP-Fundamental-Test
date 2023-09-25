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

<body>
  <main style="padding-top: 84px;" class="container">
    <h1 class="mt-5 mb-3 border-bottom fw-bold">Tambah Layanan</h1>
    <form action="./processAdd.php" method="post">
      <div class="formContent">
        <div class="row mb-3">
          <label for="inputLayanan" class="col-sm-2 col-form-label">Nama Layanan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="namaLayanan" name="namaLayanan" required>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
          <div class="col-sm-10">
            <textarea class="form-control" placeholder="Deskripsi" id="textArea" style="height: 100px" name="deskripsi" required></textarea>
          </div>
        </div>

        <div class="row mb-3">
          <label for="selectSatuan" class="col-sm-2 col-form-label">Satuan Pesanan</label>
          <div class="col-sm-10">
            <select class="form-select" name="satuanLayanan" id="satuanLayanan" required>
              <option value="" disabled selected>Pilih Satuan</option>
              <option value="per pcs"> per pcs</option>
              <option value="per jam">per jam</option>
              <option value="per pax">per pax</option>
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputHarga" class="col-sm-2 col-form-label">Harga Layanan (Rp)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="harga" name="harga" required>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col ps-1">
          <button type="submit" class="btn btn-primary">
            <span class="fa-solid fa-floppy-disk"></span>
            Simpan
          </button>
          <input type="hidden" name="tambahLayanan" value="1">
        </div>

      </div>
    </form>
  </main>

  <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>