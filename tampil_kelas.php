<link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<?php
require_once ('Admin/Config/koneksi.php');
require_once ('Admin/Models/database.php');

$koneksi = new Database($host, $user, $pass, $db);
include 'Admin/Models/m_jurusan.php';

$jurusan = new Jurusan($koneksi);

?>
<div class="modal-header">
    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
     <h4 class="modal-title">Daftar Siswa</h4>
</div>
<div class="modal-body">
<table class="table table-striped table-bordered small">
    <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
    </tr>
    <?php 
    $no = 1;
    $id_jurusan = isset($_GET['id_jurusan'])?$_GET['id_jurusan']*1:0;
    $tampil = $jurusan->tampil_kelas($id_jurusan);
    while ($data_jurusan = $tampil->fetch_object()) {
        ?>
    <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $data_jurusan->nim?></td>
        <td><?php echo $data_jurusan->nama_mhs?></td>
        <td><?php echo $data_jurusan->jk?></td>
        <td><?php echo $data_jurusan->agama?></td>
        <td><?php echo $data_jurusan->alamat?></td>


    </tr>
    <?php
    } ?>
</table>
</div>
<div class="modal-footer">
<button onclick="goBack()" class="btn btn-danger btn-block">Go Back</button>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>