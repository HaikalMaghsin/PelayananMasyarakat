<?php
    include'../config/koneksi.php';
    $masyarakat = mysqli_query($connect,'select * from masyarakat');
    $jml_masyarakat = mysqli_num_rows($masyarakat);

    $petugas = mysqli_query($connect,'select * from petugas');
    $jml_petugas = mysqli_num_rows($petugas);

    $pengaduan = mysqli_query($connect,'select * from pengaduan');
    $jml_pengaduan = mysqli_num_rows($pengaduan);

    $tanggapan = mysqli_query($connect,'select * from tanggapan');
    $jml_tanggapan = mysqli_num_rows($tanggapan);
?>

<div class="container">
    <h3 class="mt-3">Dashboard</h3>
    <div class="row">
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Masyarakat</div>
                <div class="card-body"><?php echo $jml_masyarakat ?> orang</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Pengaduan</div>
                <div class="card-body"><?php echo $jml_pengaduan ?> Aduan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Tanggapan</div>
                <div class="card-body"><?php echo $jml_tanggapan ?> Tanggapan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Petugas</div>
                <div class="card-body"><?php echo $jml_petugas ?> pengguna</div>
            </div>
        </div>
    </div>
</div>