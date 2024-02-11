<?php
include 'config/koneksi.php';
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
    header ('location:index.php?page=Login');
} else {
    echo "pendaftaran gagal: " .mysqli_error($connect);
}
}

?>
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">
                Registrasi Masyarakat
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="number" class="form-control" name="NIK" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="Nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="Username" placeholder="Masukkan Username"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="Password" placeholder="Masukkan Password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <input type="number" class="form-control" name="Telp" placeholder="Masukkan No Telp" required>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="kirim" class="btn btn-primary">Daftar</button>
                <a href="index.php?page=Login">Sudah punya akun? Login disini!</a>
            </div>
            </form>
        </div>
    </div>
</div>