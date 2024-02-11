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
if (isset($_POST['hapus_tanggapan'])) {
    $Id_tanggapan = $_POST['Id_tanggapan'];
    $sql1 = mysqli_query($connect,"delete from tanggapan where Id_tanggapan = '$Id_tanggapan'");
    if ($sql1) {
        header('location:index.php?page=tanggapan');
    }   
}
if (isset($_POST['hapus_masyarakat'])) {
    $NIK = $_POST['NIK'];
    $sql1 = mysqli_query($connect,"delete from masyarakat where NIK = '$NIK'");
    if ($sql1) {
        header('location:index.php?page=masyarakat');
    }   
}
if (isset($_POST['hapus_petugas'])) {
    $Id_petugas = $_POST['Id_petugas'];
    $sql1 = mysqli_query($connect,"delete from petugas where Id_petugas = '$Id_petugas'");
    if ($sql1) {
        header('location:index.php?page=petugas');
    }   
}
?>