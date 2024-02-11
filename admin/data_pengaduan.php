<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Data Pengaduan
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $sql1 = mysqli_query($connect, "select a.*,b.* from pengaduan a inner join masyarakat b on a.nik=b.nik order by Id_pengaduan desc");
                            while ($data = mysqli_fetch_array($sql1)) { ?>

                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Tgl_pengaduan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Judul_laporan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Isi_laporan']; ?>
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
                                        } else {
                                            echo "<span class='badge bg-danger'>Menunggu</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($data['Status'] != 'selesai') { ?>
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#verifikasi<?php echo $data['Id_pengaduan'] ?>">Verifikasi</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="verifikasi<?php echo $data['Id_pengaduan'] ?>"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi :
                                                            <?php echo $data['Judul_laporan'] ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="Id_pengaduan" class="form-control"
                                                                value="<?php echo $data['Id_pengaduan'] ?>">
                                                            <div class="row-mb3">
                                                                <label class="col-md-4">Status</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="Status">
                                                                        <option value="proses">Proses</option>
                                                                        <option value="0">Tolak</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="kirim"
                                                            class="btn btn-primary">Verifikasi</button>
                                                    </div>
                                                    </form>

                                                    <?php
                                                    if (isset($_POST['kirim'])) {
                                                        $Id_pengaduan = $_POST['Id_pengaduan'];
                                                        $Status = $_POST['Status'];

                                                        $sql1 = mysqli_query($connect, "update pengaduan set Status='$Status', Id_pengaduan='$Id_pengaduan'");
                                                        echo "<script> 
                                                            alert('Data berhasil diverifikasi!');
                                                            window.location = 'index.php?page=pengaduan';
                                                        </script>
                                                        ";
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php
                                        if ($data['Status'] == 'proses') { ?>
                                        <a href="" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#tanggapan<?php echo $data['Id_pengaduan'] ?>">Tanggapi</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tanggapan<?php echo $data['Id_pengaduan'] ?>"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapi :
                                                            <?php echo $data['Judul_laporan'] ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="Id_pengaduan" class="form-control"
                                                                value="<?php echo $data['Id_pengaduan'] ?>">
                                                            <div class="row-mb3">
                                                                <label class="col-md-4">Tanggal</label>
                                                                <div class="col-md-8">
                                                                   <input type="text" name="Tgl_pengaduan" class="form-control" value="<?php echo $data['Tgl_pengaduan'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row-mb3">
                                                                <label class="col-md-4">Judul</label>
                                                                <div class="col-md-8">
                                                                   <input type="text" name="Judul_laporan" class="form-control" value="<?php echo $data['Judul_laporan'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row-mb3">
                                                                <label class="col-md-4">Isi</label>
                                                                <div class="col-md-8">
                                                                    <textarea name="Isi_laporan" class="form-control" readonly><?php echo $data['Isi_laporan'] ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row-mb3">
                                                                <label class="col-md-4">Foto</label>
                                                                <div class="col-md-8">
                                                                <img src="../assets/img/<?php echo $data['foto'] ?>" width="100">
                                                                </div>
                                                            </div>
                                                            <div class="row-mb3">
                                                                <label class="col-md-4">Tanggapan</label>
                                                                <div class="col-md-8">
                                                                    <textarea name="Tanggapan" class="form-control"  required><?php echo $data['Isi_laporan'] ?></textarea>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="kirim_tanggapan"
                                                            class="btn btn-success">Tanggapi</button>
                                                    </div>
                                                    </form>

                                                    <?php
                                                    if (isset($_POST['kirim_tanggapan'])) {
                                                        $Id_pengaduan = $_POST['Id_pengaduan'];
                                                        $Id_petugas = $_SESSION['Id_petugas'];
                                                        $Tanggal = date("Y-m-d");
                                                        $Tanggapan = htmlspecialchars($_POST['Tanggapan']);

                                                        $sql2 = mysqli_query($connect, "insert into tanggapan values('','$Id_pengaduan','$Tanggal','$Tanggapan','$Id_petugas')");
                                                        if($Tanggapan != null) {
                                                            $update = mysqli_query($connect,"update pengaduan set Status='selesai' where Id_pengaduan='$Id_pengaduan'");
                                                        }
                                                        echo "<script> 
                                                        alert('Data berhasil ditanggapi!');
                                                            window.location = 'index.php?page=pengaduan';
                                                        </script>
                                                        ";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?php echo $data['Id_pengaduan'] ?>">Hapus</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?php echo $data['Id_pengaduan'] ?>"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus :
                                                            <?php echo $data['Judul_laporan'] ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="Id_pengaduan" class="form-control" value="<?php echo $data['Id_pengaduan'] ?>">
                                                            <p>Apakah anda yakin akan menghapus data? <br> <?php echo $data['Judul_laporan'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_pengaduan"
                                                            class="btn btn-danger">Hapus</button>
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