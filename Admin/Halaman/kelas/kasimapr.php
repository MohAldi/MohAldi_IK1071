<?php
include 'Models/m_kp.php';
include 'Models/m_kelas.php';
include 'Models/m_mhs.php';
include 'Models/m_jurusan.php';


$kp = new Kp($koneksi);
$kelas = new Kelas($koneksi);
$mhs = new Mhs($koneksi);
$jurusan = new Jurusan($koneksi);

?>




<div class="content-wrapper ml-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">KASIMAPR</h1>
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

    <!-- table -->
    <section class="content m--2">
<div class="container-fluid">
     <div class="row">
         <div class="col-lg-12">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkelas" class="btn btn-primary">
                 +Tambah Data
              </button>
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Mhs</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=1;
                  $tampil = $kp->tampil_kp();
                  while($data_kp = $tampil->fetch_object()){
                  
                  ?>

                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $data_kp->kd_kelas?></td>
                    <td><?= $data_kp->nama_mhs?></td>
                    <td><?= $data_kp->nama_jurusan?></td>
                    <td>
                    <a href="" id="ubah_kelas" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_kelas="<?php echo $data_kp->id_kelas;?>" data-kd_kelas="<?php echo $data_kp->kd_kelas;?>" data-id_mhs="<?php echo $data_kp->id_mhs;?>" data-id_jurusan="<?php echo $data_kp->id_jurusan;?>"><i class="far fa-edit"></i></a> <a href="" id="hapus_kelas" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#modalhapus" data-id_kelas="<?php echo $data_kp->id_kelas;?>"><i class="fas fa-trash"></i></a>
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
    <!-- end table -->
</div>
<div class="modal fade" id="tambahkelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="" method="POST" enctype="multipart/form-data">
     
      <div class="modal-body">
        <div class="form-group">
          <label for="">Kode Kelas</label>
          <input type="text" name="kd_kelas" id="kd_kelas" placeholder="Nama Mahasiswa" required class="form-control">
        </div>

      
         <div class="form-group">
         <label for="">Nama Mahasiswa</label>
         <select name="id_mhs" id="id_mhs" class="form-control">
         <?php  
         $tampil = $mhs->tampil_mhs();
         while($data_mhs = $tampil->fetch_object()){
                  
          ?>
         <option value="<?=$data_mhs->id_mhs?>"><?=$data_mhs->nama_mhs?></option>
         <?php } ?>
         </select>
        </div>

        <div class="form-group">
          <label for="">Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
          <?php  
         $tampil = $jurusan->tampil_jurusan();
         while($data_jurusan = $tampil->fetch_object()){
          ?>
           <option value="<?=$data_jurusan->id_jurusan?>"><?=$data_jurusan->nama_jurusan?></option>
         
          <?php }?>
          </select>
        </div>

        
      
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="tambah" value="simpan" class="btn btn-primary">Simpan</button>
        
      </div>
    
      </form>
      
      <!-- proses -->
      <?php
      if ($_POST['tambah']) {
        $kd_kelas = $koneksi->conn->real_escape_string($_POST['kd_kelas']);
        $id_mhs = $koneksi->conn->real_escape_string($_POST['id_mhs']);
        $id_jurusan = $koneksi->conn->real_escape_string($_POST['id_jurusan']);
        $kelas->tambah_kelas($kd_kelas,$id_mhs,$id_jurusan);
        header('location: ?page=kasimapr');
      }
      ?>
      <!-- end Proses tambah -->
    </div>
  </div>
</div>
<!-- en Tambah data -->

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
          <label for="">Kode Kelas</label>
          <input type="text" name="kd_kelas" id="kd_kelas" class="form-control">
          <input type="text" name="id_kelas" id="id_kelas" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Nama Mahasiswa</label>
          <input type="text" name="id_mhs" id="id_mhs" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Jurusan</label>
          <input type="text" name="id_jurusan" id="id_jurusan" class="form-control">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="ubah" name="ubah" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>
      <?php
      if ($_POST['ubah']) {
        $id_kelas = $_POST['id_kelas'];
        $kd_kelas = $koneksi->conn->real_escape_string($_POST['kd_kelas']);
        $id_mhs = $koneksi->conn->real_escape_string($_POST['id_mhs']);
        $id_jurusan = $koneksi->conn->real_escape_string($_POST['id_jurusan']);
        $kelas->ubah_kelas($id_kelas,$kd_kelas,$id_mhs,$id_jurusan);
        header('location: ?page=kasimapr');
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
        <input type="text" name="id_kelas" id="id_kelas">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-danger">Hapus</button>
      </div>
      </form>
      <?php
      if (@$_POST['hapus']) {
        $id_kelas = $_POST['id_kelas'];
        $kelas->hapus_kelas($id_kelas);
        
        header('location: ?page=kasimapr');
      }
      ?>
      
    </div>
  </div>
</div>
<!-- end modal hapus -->


<!-- jquery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(document).on('click','#hapus_kelas',function() {
    var id_kelas = $(this).data('id_kelas');

    $('#modalhapus #id_kelas').val(id_kelas);
    
  });
  $(document).on('click','#ubah_kelas', function() {
    var id_kelas = $(this).data('id_kelas');
    var kd_kelas = $(this).data('kd_kelas');
    var id_mhs = $(this).data('id_mhs');
    var id_jurusan = $(this).data('id_jurusan');

    $('#modalubah #id_kelas').val(id_kelas);
    $('#modalubah #kd_kelas').val(kd_kelas);
    $('#modalubah #id_mhs').val(id_mhs);
    $('#modalubah #id_jurusan').val(id_jurusan);
  });



</script>
<!-- end Jquey -->