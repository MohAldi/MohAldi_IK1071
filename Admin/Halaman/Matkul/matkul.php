<?php
include 'Models/m_matkul.php';
include 'Models/m_dosen.php';


$mat = new Matkul($koneksi);
$dosen = new Dosen($koneksi);
?>

<div class="content-wrapper m-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MATAKULIAH</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



<section class="content m--2">
<div class="container-fluid">
     <div class="row">
         <div class="col-lg-12">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">MATAKULIAH</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                 <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahmatkul" class="btn btn-primary">
                 +Tambah Data
              </button>
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Nama Dosen</th>
                    <th>Aksi</th>
                  
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  $tampil = $mat->tampil_mat();
                  while($data_mat = $tampil->fetch_object()){
                  ?>

                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $data_mat->kd_matkul?></td>
                    <td><?= $data_mat->nama_matkul?></td>
                    <td> <?= $data_mat->nama?></td>
                    <td>
                    <a href="" id="ubahmatkul" class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#modalubah" data-id_matkul="<?php echo $data_mat->id_matkul;?>" data-kd_matkul="<?php echo $data_mat->kd_matkul;?>" data-nama_matkul="<?php echo $data_mat->nama_matkul;?>" data-id_dosen="<?php echo $data_mat->id_dosen;?>"><i class="far fa-edit"></i></a> <a href="#" id="hapus_matkul" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalhapus" data-id_matkul="<?php echo $data_mat->id_matkul;?>"><i class="fas fa-trash"></i></a>

                    </td>
                  </tr>


                <?php
                }
                ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahmatkul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">
      <div class="form-group">
                <label for="">Kode Matkul</label>
                <input type="text" name="kd_matkul" id="kd_matkul" placeholder="Kode Matakuliah" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="">Matakuliah</label>
                <input type="text" name="nama_matkul" id="nama_matkul" placeholder="Matakuliah" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="">Dosen Pengajar</label>
                <select name="id_dosen" id="id_dosen" class="form-control" required>
                <?php
                  $tampil = $dosen->tampil_dosen();
                  while($data_dosen = $tampil->fetch_object()){
                  ?>
                  <option value="<?= $data_dosen->id_dosen?>"><?= $data_dosen->nama?></option>
                  <?php }?>
                </select>
              </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="tambahmat" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>


      <?php
      if (@$_POST['tambahmat']) {
        $kd_matkul = $koneksi->conn->real_escape_string($_POST['kd_matkul']);
        $nama_matkul = $koneksi->conn->real_escape_string($_POST['nama_matkul']);
        $id_dosen = $koneksi->conn->real_escape_string($_POST['id_dosen']);
        $mat->tambah_matkul($kd_matkul,$nama_matkul,$id_dosen);
        header('location: ?page=matkul');
      }
      ?>
    </div>
  </div>
</div>
<!-- end tambah -->

<!-- modal Ubah -->
<div class="modal" id="modalubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" id="form" enctype="multipart/form-data">
      <div class="modal-body">

        <div class="form-group">
          <input type="text" name="id_matkul" id="id_matkul" class="form-control">
          <label for="">Kode Matakuliah</label>
          <input type="text" name="kd_matkul" id="kd_matkul" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Matkul</label>
          <input type="text" name="nama_matkul" id="nama_matkul" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Dosen Pengajar</label>
         <input type="text" name="id_dosen" id="id_dosen">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="ubah" name="ubah" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>
      <?php
      if (@$_POST['ubah']) {
        $id_matkul =$_POST['id_matkul'];
        $kd_matkul = $koneksi->conn->real_escape_string($_POST['kd_matkul']);
        $nama_matkul = $koneksi->conn->real_escape_string($_POST['nama_matkul']);
        $id_dosen = $koneksi->conn->real_escape_string($_POST['id_dosen']);
        $mat->ubah_matkul($id_matkul,$kd_matkul,$nama_matkul,$id_dosen);
        header('location: ?page=matkul');
      }
      ?>


    </div>
  </div>
</div>
<!-- end modal ubah -->


<!-- modal hapus -->
<div class="modal" id="modalhapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="text" name="id_matkul" id="id_matkul">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-danger">Hapus</button>
      </div>
      </form>
      <?php
      if (@$_POST['hapus']) {
        $id_matkul = $_POST['id_matkul'];
        $mat->hapus_matkul($id_matkul);
        
        header('location: ?page=matkul');
      }
      ?>
    </div>
  </div>
</div>
<!-- end modal hapus -->


<!-- Jquery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).on('click','#hapus_matkul',function() {
    var id_matkul = $(this).data('id_matkul');

    $('#modalhapus #id_matkul').val(id_matkul);
    
  });

  $(document).on('click','#ubahmatkul', function() {
    var id_matkul = $(this).data('id_matkul');
    var kd_matkul = $(this).data('kd_matkul');
    var nama_matkul = $(this).data('nama_matkul');
    var id_dosen = $(this).data('id_dosen');

    $('#modalubah #id_matkul').val(id_matkul);
    $('#modalubah #kd_matkul').val(kd_matkul);
    $('#modalubah #nama_matkul').val(nama_matkul);
    $('#modalubah #id_dosen').val(id_dosen);
  });

  // $(document).ready(function (e) {
  //   $('#form').on('submit',(function (e) {
  //     e.preventDefault();
  //     $.ajax({
  //       url:'Models/ubah_matkul',
  //       type:'POST',
  //       data : new FormData(this),
  //       contentType:false,
  //       cache:false,
  //       processData:false,
  //       success:function(pesan){
  //         $('.table').html(pesan);
  //       }
  //     })
      
  //   }))
    
  // });

</script>