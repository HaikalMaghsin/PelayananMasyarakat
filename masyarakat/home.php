<div class="container">
    <div class="row">
        <div class="col-md-12" mt-3>
            <p>Selamat Datang
                <?php echo $_SESSION['Nama']; ?>
            </p>
            <div class="card">
                <div class="card-header">
                    Form Pengaduan
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Judul Laporan</label>
                            <input type="text" class="form-control" name="Judul_laporan"
                                placeholder="Masukkan Judul Laporan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Laporan</label>
                            <textarea class="form-control" name="Isi_laporan" placeholder="Masukkan Isi Laporan"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
                </div>
                </form>
                <?php
                include '../config/koneksi.php';
                $Tanggal = date("Y-m-d");
                if (isset($_POST['kirim'])) {
                    $NIK = htmlspecialchars($_SESSION['NIK']);
                    $Judul_laporan = htmlspecialchars($_POST['Judul_laporan']);
                    $Isi_laporan = htmlspecialchars($_POST['Isi_laporan']);
                    $Status = 0;
                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                    $lokasi = '../assets/img/';
                    $nama_foto = rand(0, 999) . '-' . $foto;

                    move_uploaded_file($tmp, $lokasi . $nama_foto);
                    $sql1 = mysqli_query($connect, "insert into pengaduan values('','$Tanggal','$NIK','$Judul_laporan','$Isi_laporan','$nama_foto','$Status')");

                    echo "<script> alert('Data berhasil dikirim!');
                    window.location = 'index.php';
                    </script>
                    ";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Pengaduan
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $NIK = $_SESSION['NIK'];
                            $sql1 = mysqli_query($connect, "select * from pengaduan where NIK = '$NIK' order by Id_pengaduan desc");
                            while ($data = mysqli_fetch_array($sql1)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Judul_laporan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Isi_laporan'] ?>
                                    </td>
                                    <td>
                                        <img src="../assets/img/<?php echo $data['foto'] ?>" width="100">
                                    </td>
                                    <td>
                                        <?php
                                        if ($data['Status'] == 'proses') {
                                            echo "<span class='badge bg-warning'>Proses</span>";
                                        } elseif ($data['Status'] == 'selesai') {
                                            echo "<span class='badge bg-success'>Selesai</span>";
                                            echo"<br><a href='index.php?page=tanggapan&Id_pengaduan=$data[Id_pengaduan]'> Lihat Tanggapan </a>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Menunggu</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal<?php echo $data['Id_pengaduan'] ?>">
                                            Hapus
                                        </button>
                                        <div class="modal fade" id="hapusModal<?php echo $data['Id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="edit_data.php" method="POST">
                                                        <input type="hidden" name="Id_pengaduan"
                                                            value="<?php echo $data['Id_pengaduan'] ?>">
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus data <br> <?php echo $data['Judul_laporan'] ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger"
                                                                name="hapus_pengaduan" href="index.php">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>