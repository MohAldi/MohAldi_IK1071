<?php
include 'Models/n_ks.php';
include 'Models/m_matkul.php';
include 'Models/m_jurusan.php';
include 'Models/m_dosen.php';
include 'Models/m_mhs.php';
include 'Models/n_nilai.php';

$ks = new n_ks($koneksi);
$mat = new Matkul($koneksi);
$jurusan = new Jurusan($koneksi);
$dosen = new Dosen($koneksi);
$mhs = new Mhs($koneksi);
$nilai = new n_nilai($koneksi);
?>




<div class="content-wrapper ml-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">KS nilai</h1>
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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahnilai">
                   +Tambah Data
                </button>
                  <thead>
                  <tr>
                  <th>No</th>
                    <th>Nama</th>
                    <th>Matakuliah</th>
                    <th>Jurusan</th>
                    <th>Dosen Pengajar</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=1;
                  $tampil = $ks->tampil_ks();
                  while($data_ks = $tampil->fetch_object()){
                  
                  ?>
                  <tr>
                   <td><?= $no++?></td>
                   <td><?=$data_ks->nama_mhs?></td>
                   <td><?=$data_ks->nama_matkul?></td>
                   <td><?=$data_ks->nama_jurusan?></td>
                   <td><?=$data_ks->nama?></td>
                   <td><?=$data_ks->nilai?></td>
                   <td>
                    <a href="" id="ubah_nilai" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_nilai="<?php echo $data_ks->id_nilai?>" data-id_mhs= "<?php echo $data_ks->id_mhs?>" data-id_matkul="<?php echo $data_ks->id_matkul?>" data-id_dosen="<?php echo $data_ks->id_dosen?>" data-id_jurusan="<?php echo $data_ks->id_jurusan?>" data-nilai="<?php echo $data_ks->nilai?>"><i class="far fa-edit"></i></a> <a href="" id="hapus_nilai" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#modalhapus" data-id_nilai="<?php echo $data_ks->id_nilai?>"><i class="fas fa-trash"></i></a>
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
<!-- tambah data -->
<div class="modal fade" id="tambahnilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data  ">
      <div class="modal-body">
      
          <div class="form-group">
            <label for="">Nama</label>
           <select name="id_mhs" id="id_mhs">
              <?php
              $tampil =$mhs->tampil_mhs();
              while ($data_mhs = $tampil->fetch_object()) {
               
              ?>
              <option value="<?= $data_mhs->id_mhs?>"><?= $data_mhs->nama_mhs?></option>
              <?php } ?>

           </select>
          </div>

          <div class="form-group">
           <label for="">MataKuliah</label>
           <select name="id_matkul" id="id_matkul" class="form-control">
             <?php
             $tampil = $mat->tampil_mat();
             while ($data_mat=$tampil->fetch_object()) {
               # code...
             
             ?>
           <option value="<?= $data_mat->id_matkul?>" ><?=$data_mat->nama_matkul?></option>
           <?php } ?>
           </select>

           <div class="form-group">
           <label for="">Dosen Pengajar</label>
           <select name="id_dosen" id="id_dosen" class="form-control">
           <?php 
           $tampil = $dosen->tampil_dosen();
           while ($data_dosen=$tampil->fetch_object()) {
             # code...
           
           ?>
           <option value="<?=$data_dosen->id_dosen?>"><?=$data_dosen->nama?></option>
           <?php }?>
           </select>
           </div>

           <div class="form-group">
            <label for="">Jurusan</label>
           <select name="id_jurusan" id="id_jurusan" class="form-control">
             <?php
             $tampil = $jurusan->tampil_jurusan();
             while ($data_jurusan=$tampil->fetch_object()) {
               # code...
            
             ?>
                 <option value="<?= $data_jurusan->id_jurusan?>"><?=$data_jurusan->nama_jurusan?></option>
                  <?php } ?>
           </select>
          </div>

          </div>
          <div class="form-group">
            <label for="">Nilai</label>
            <input type="text" name="nilai" id="nilai" class="form-control">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="tambah" id ="submit" value="simpan" class="btn btn-primary">simpan</button>
      </div>
      </form>
      <?php
      if ($_POST['tambah']) {
        $id_mhs = $koneksi->conn->real_escape_string($_POST['id_mhs']);
        $id_matkul = $koneksi->conn->real_escape_string($_POST['id_matkul']);
        $id_dosen = $koneksi->conn->real_escape_string($_POST['id_dosen']);
        $id_jurusan = $koneksi->conn->real_escape_string($_POST['id_jurusan']);
        $nilai1 = $koneksi->conn->real_escape_string($_POST['nilai']);
        $nilai->tambah_nilai($id_mhs,$id_matkul,$id_dosen,$id_jurusan,$nilai1);
        header('location: ?page=ksn');
      }
      
      ?>

    </div>
  </div>
</div>
<!-- end tambah data -->



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
          <label for="">Nama</label>
          <input type="text" name="id_mhs" id="id_mhs" class="form-control">
          <input type="text" name="id_nilai" id="id_nilai" class="form-control">
        </div>

        <div class="form-group">
          <label for="">MataKuliah</label>
          <input type="text" name="id_matkul" id="id_matkul" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Dosen Pengajar</label>
          <input type="text" name="id_dosen" id="id_dosen" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Jurusan</label>
          <input type="text" name="id_jurusan" id="id_jurusan" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Nilai</label>
          <input type="text" name="nilai" id="nilai" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="ubah" name="ubah" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>
      <?php
      if ($_POST['ubah']) {
        $id_nilai = $_POST['id_nilai'];
        $id_mhs = $koneksi->conn->real_escape_string($_POST['id_mhs']);
        $id_matkul = $koneksi->conn->real_escape_string($_POST['id_matkul']);
        $id_dosen = $koneksi->conn->real_escape_string($_POST['id_dosen']);
        $id_jurusan = $koneksi->conn->real_escape_string($_POST['id_jurusan']);
        $nilai1 = $koneksi->conn->real_escape_string($_POST['nilai']);
        $nilai->ubah_nilai($id_nilai,$id_mhs,$id_matkul,$id_dosen,$id_jurusan,$nilai1);
        header('location: ?page=kasimaprn');
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
        <input type="text" name="id_nilai" id="id_nilai">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-danger">Hapus</button>
      </div>
      </form>

      <?php
      if (@$_POST['hapus']) {
        $id_nilai = $_POST['id_nilai'];
        $nilai->hapus_nilai($id_nilai);
        
        header('location: ?page=kasimaprn');
      }
      ?>
    
    </div>
  </div>
</div>
<!-- end modal hapus -->

<!-- jquery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(document).on('click','#hapus_nilai',function() {
    var id_nilai = $(this).data('id_nilai');

    $('#modalhapus #id_nilai').val(id_nilai);
    
  });
  $(document).on('click','#ubah_nilai', function() {
    var id_nilai = $(this).data('id_nilai');
    var id_mhs = $(this).data('id_mhs');
    var id_matkul = $(this).data('id_matkul');
    var id_dosen = $(this).data('id_dosen');
    var id_jurusan = $(this).data('id_jurusan');
    var nilai = $(this).data('nilai');

    $('#modalubah #id_nilai').val(id_nilai);
    $('#modalubah #id_mhs').val(id_mhs);
    $('#modalubah #id_matkul').val(id_matkul);
    $('#modalubah #id_dosen').val(id_dosen);
    $('#modalubah #id_jurusan').val(id_jurusan);
    $('#modalubah #nilai').val(nilai);
    

  });






</script>
<!-- end Jquey -->