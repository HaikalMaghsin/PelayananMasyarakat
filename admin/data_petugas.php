<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Data Petugas
                </div>
                <div class="card-body">
                    <a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah
                        Data</a>
                    <div class="modal fade" id="tambahData" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Petugas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="row-mb3">
                                            <label class="col-md-4">Nama Lengkap</label>
                                            <div class="col-md-8">
                                                <input type="text" name="Nama_petugas" class="form-control" placeholder="Masukan Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="row-mb3">
                                            <label class="col-md-4">Username</label>
                                            <div class="col-md-8">
                                                <input type="text" name="Username" class="form-control" placeholder="Masukan Username" required>
                                            </div>
                                        </div>
                                        <div class="row-mb3">
                                            <label class="col-md-4">Password</label>
                                            <div class="col-md-8">
                                                <input type="password" name="Password" class="form-control" placeholder="Masukan Password" required>
                                            </div>
                                        </div>
                                        <div class="row-mb3">
                                            <label class="col-md-4">Telp</label>
                                            <div class="col-md-8">
                                                <input type="number" name="Telp" class="form-control" placeholder="Masukan No Telp" required>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="kirim" class="btn btn-dark">Tambah Data</button>
                                </div>
                                </form>

                                <?php
                                include '../config/koneksi.php';
                                $Nama_petugas = "";
                                $Username = "";
                                $Password = "";
                                $Telp = "";
                                $Level = "";
                                if (isset($_POST['kirim'])) {
                                    $Nama_petugas = $_POST['Nama_petugas'];
                                    $Username = $_POST['Username'];
                                    $Password = md5($_POST['Password']);
                                    $Telp = $_POST['Telp'];
                                    $Level = 'petugas';
                                
                                    $sql1 = "insert into petugas(Id_petugas,Nama_petugas,Username,Password,Telp,Level) values('','$Nama_petugas','$Username','$Password','$Telp','$Level')";
                                if (mysqli_query($connect, $sql1)) {
                                    header ('location:index.php?page=petugas');
                                } 
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $sql1 = mysqli_query($connect, "select * from petugas");
                            while ($data = mysqli_fetch_array($sql1)) { ?>

                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Nama_petugas']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Telp']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Level']; ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?php echo $data['Id_petugas'] ?>">Hapus</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?php echo $data['Id_petugas'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus :
                                                            <?php echo $data['Nama_petugas'] ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                         <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="Id_petugas" class="form-control"
                                                                value="<?php echo $data['Id_petugas'] ?>">
                                                            <p>Apakah anda yakin akan menghapus data? <br>
                                                                <?php echo $data['Nama_petugas'] ?>
                                                            </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_petugas"
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