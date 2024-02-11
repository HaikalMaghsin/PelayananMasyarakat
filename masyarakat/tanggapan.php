<?php
include '../config/koneksi.php';
if(!empty($_GET['Id_pengaduan'])){
    $Id = $_GET['Id_pengaduan'];
    $sql1 = mysqli_query($connect,"select a.*,b.* from pengaduan a inner join tanggapan b on a.Id_pengaduan=b.Id_pengaduan where b.Id_pengaduan=$Id");
    $data = mysqli_fetch_array($sql1);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12" mt-3>
            <div class="card">
                <div class="card-header">
                    Lihat Tanggapan
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Judul Laporan</label>
                            <input type="text" class="form-control" value="<?php echo $data['Judul_laporan'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Laporan</label>
                            <textarea class="form-control" readonly><?php echo $data['Isi_laporan'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <img src="../assets/img/<?php echo $data['foto'] ?>" class="form-control" style="width: 150px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggapan</label>
                            <textarea class="form-control" readonly><?php echo $data['Tanggapan'] ?></textarea>
                        </div>
                </div>
                <div class="card-footer">
                    <a href="index.php" class="btn btn-primary">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } else {
    echo "Halaman Tidak Tersedia";
} ?>