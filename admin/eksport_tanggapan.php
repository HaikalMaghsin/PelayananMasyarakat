<?php
header("Content-type: application/vnd-ms-excel");
header("Content-disposition: attachment; filename=Data Pengaduan dan Tanggapan.xls");
?>

<center>
    <h3>Laporan Pengaduan dan Tanggapan</h3>
</center>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>NIK</th>
            <th>Judul Laporan</th>
            <th>Tanggapan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NIK</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Tanggapan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $sql1 = mysqli_query($connect, "select a.*,b.* from tanggapan a inner join pengaduan b on a.Id_pengaduan=b.Id_pengaduan");
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
                            <?php echo $data['Isi_laporan']; ?>
                        </td>
                        <td>
                            <?php echo $data['Tanggapan']; ?>
                        </td>
                        <td>
                            <?php echo $data['Status']; ?>
                        </td>
                    <?php } ?>
            </tbody>
        </table>