<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Data Tanggapan
                </div>
                <div class="card-body">
                    <a href="eksport_tanggapan.php" class="btn btn-success" target="_blank">Eksport Excel</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>Judul</th>
                                <th>Tanggapan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $sql1 = mysqli_query($connect, "select a.*,b.* from tanggapan a inner join pengaduan b on a.Id_pengaduan=b.Id_pengaduan order by Tgl_tanggapan desc");
                            while ($data = mysqli_fetch_array($sql1)) { ?>

                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Tgl_pengaduan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['NIK']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Judul_laporan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Tanggapan']; ?>
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
                                    <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?php echo $data['Id_tanggapan'] ?>">Hapus</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?php echo $data['Id_tanggapan'] ?>"
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
                                                            <input type="hidden" name="Id_tanggapan" class="form-control" value="<?php echo $data['Id_tanggapan'] ?>">
                                                            <p>Apakah anda yakin akan menghapus tanggapan? <br> <?php echo $data['Judul_laporan'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_tanggapan"
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