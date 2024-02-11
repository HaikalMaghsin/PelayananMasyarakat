<?php
session_start();
include 'koneksi.php';

$Username = $_POST['username'];
$Password = md5($_POST['password']);
$Level    = $_POST['Level'];

if ($Level == 'masyarakat') {
    $Login = mysqli_query($connect,"select * from masyarakat where Username = '$Username' and Password = '$Password'");
} else {
    $Login = mysqli_query($connect,"select * from petugas where Username = '$Username' and Password = '$Password'");
}
$Cek = mysqli_num_rows($Login);

if ($Cek > 0) {
    $data = mysqli_fetch_assoc($Login);
    if ($data["Level"] == "admin") {
        $_SESSION['Id_petugas'] = $data['Id_petugas'];
        $_SESSION['Nama_petugas'] = $data['Nama_petugas'];
        $_SESSION['Login'] = "admin";
        header('location:../admin/');
    } elseif ($data["Level"] == "petugas") {
        $_SESSION['Id_petugas'] = $data['Id_petugas'];
        $_SESSION['Nama_petugas'] = $data['Nama_petugas'];
        $_SESSION['Login'] = "petugas";
        header('location:../admin/');
    } else {
        $_SESSION['NIK'] = $data['NIK'];
        $_SESSION['Nama'] = $data['Nama'];
        $_SESSION['Login'] = "masyarakat";
        header('location:../masyarakat/');
    }
} else {
    echo "<script>
    alert('Username dan Password tidak terdaftar');
    window.location = '../index.php';
    </script>";
}

?>