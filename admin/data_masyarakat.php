<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Data Masyarakat
                </div>
                <div class="card-body">
                    <a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah
                        Data</a>
                    <div class="modal fade" id="tambahData" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Masyarakat</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="row-mb3">
                                            <label class="col-md-4">NIK</label>
                                            <div class="col-md-8">
                                                <input type="number" name="NIK" class="form-control" placeholder="Masukan NIK" required>
                                            </div>
                                        </div>
                                        <div class="row-mb3">
                                            <label class="col-md-4">Nama Lengkap</label>
                                            <div class="col-md-8">
                                                <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="row-mb3">
                                            <label class="col-md-4">Username</label>
                                            <div class="col-md-8">
                                                <input type="text" name="Username" class="form-control" placeholder="Masukan NIK" required>
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
                                $NIK = "";
                                $Nama = "";
                                $Username = "";
                                $Password = "";
                                $Telp = "";
                                $Level = "";
                                if (isset($_POST['kirim'])) {
                                    $NIK = $_POST['NIK'];
                                    $Nama = $_POST['Nama'];
                                    $Username = $_POST['Username'];
                                    $Password = md5($_POST['Password']);
                                    $Telp = $_POST['Telp'];
                                    $Level = 'masyarakat';
                                
                                    $sql1 = "insert into masyarakat(NIK,Nama,Username,Password,Telp,Level) values('$NIK','$Nama','$Username','$Password','$Telp','$Level')";
                                if (mysqli_query($connect, $sql1)) {
                                    header ('location:index.php?page=masyarakat');
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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $sql1 = mysqli_query($connect, "select * from masyarakat");
                            while ($data = mysqli_fetch_array($sql1)) { ?>

                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['NIK']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Telp']; ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?php echo $data['NIK'] ?>">Hapus</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?php echo $data['NIK'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus :
                                                            <?php echo $data['Nama'] ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                         <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="NIK" class="form-control"
                                                                value="<?php echo $data['NIK'] ?>">
                                                            <p>Apakah anda yakin akan menghapus data? <br>
                                                                <?php echo $data['Nama'] ?>
                                                            </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_masyarakat"
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