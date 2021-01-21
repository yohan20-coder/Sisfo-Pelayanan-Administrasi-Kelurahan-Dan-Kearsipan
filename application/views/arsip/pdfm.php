<?php
    include "tgl.php";
?>
<!DOCTYPE html>
<html><head>
<title></title>
</head><body>

<style>
 h3{
  text-align : center;
 }
 th{
     margin-left: 35px !important;
     margin-right: 15px !important;
     margin-bottom: 5px !important;
 }

 td{
    margin-left: 25px !important;
}
hr{
    background : black;
}
</style>

<h3>Laporan Rekapan Arsip Surat Masuk <br> Keluarahan Rewarangga</h3><hr>
<table>
        <tr>
            <th>No</th>
            <th>No.Surat</th>
            <th>No.Klasifikasi</th>
            <th>Tgl Surat</th>
            <th>Tgl Diterima</th>
            <th>Perihal</th>
            <th>Isi Ringkas</th>
            <th>Asal Instansi</th>
        </tr>
        <?php $no = 1 ?>
        <?php foreach($tampil as $sm): ?>
    <tr>
        <td style=" margin-left: 35px !important;"><?= $no ?></td>
        <td><?= $sm['nosurat'] ?></td>
        <td><?= $sm['noklasi'] ?></td>
        <td><?= tgl_indo($sm['tglsurat']) ?></td>
        <td><?= tgl_indo($sm['tglteri']) ?></td>
        <td><?= $sm['perihal'] ?></td>
        <td><?= $sm['isi'] ?></td>
        <td><?= $sm['instansi'] ?></td>
    </tr>
<?php $no++ ?>
<?php endforeach ?>
</table>
</body></html>