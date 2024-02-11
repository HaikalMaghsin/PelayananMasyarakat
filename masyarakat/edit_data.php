<?php
session_start();
include '../config/koneksi.php';

if (isset($_POST['hapus_pengaduan'])) {
    $Id_pengaduan = $_POST['Id_pengaduan'];
    $sql1 = mysqli_query($connect,"select * from pengaduan where Id_pengaduan = '$Id_pengaduan'");
    $data = mysqli_fetch_array($sql1);
    if (is_file('../assets/img/'.$data['foto'])) {
        unlink('../assets/img/'.$data['foto']);
        mysqli_query($connect,"delete from pengaduan where Id_pengaduan = '$Id_pengaduan'");
        header('location:index.php');
    }   
}

?>