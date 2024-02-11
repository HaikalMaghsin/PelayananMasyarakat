<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Aplikasi pengaduan masyarakat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
          if ($_SESSION ["Login"] == "admin") { ?>
            <a class="nav-link" href="/Pelayanan_Masyarakat/admin/">Dashboard</a>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=masyarakat">Data Masyarakat</a>
            <a class="nav-link" href="index.php?page=petugas">Data Petugas</a>
            <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

          <?php } elseif ($_SESSION ["Login"] == "petugas") { ?>
            <a class="nav-link" href="/Pelayanan_Masyarakat/admin/">Dashboard</a>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=tanggapan">Data tanggapan</a>
            <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

          <?php } elseif ($_SESSION ["Login"] == "masyarakat") { ?>
            <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>
          
          <?php } else { ?>
            <a class="nav-link" href="/Pelayanan_Masyarakat/index.php">Daftar Kelas</a>
            <a class="nav-link" href="index.php?page=Registrasi">Daftar Kelas</a>
            <a class="nav-link" href="index.php?page=Login">Login</a>
            
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>