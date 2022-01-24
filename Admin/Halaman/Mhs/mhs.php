<?php
include 'Models/m_mhs.php';
$mhs = new Mhs($koneksi);

?>


<div class="content-wrapper ml-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">INFROKOM NILAI</h1>
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
<!-- /.card -->

<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                +Tambah Data
                </button>
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jk</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>No.Telepon</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      $tampil = $mhs->tampil_mhs();
                      while ($data_mhs = $tampil->fetch_object()) {
                          # code...
                      
                      ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$data_mhs->nim?></td>
                    <td><?=$data_mhs->nama_mhs?></td>
                    <td><?=$data_mhs->jk?></td>
                    <td><?=$data_mhs->agama?></td>
                    <td><?=$data_mhs->alamat?></td>
                    <td><?=$data_mhs->notlp?></td>
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

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="">Nim</label>
              <input type="text" name="nim" id="nim" placeholder="Nim" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama_mhs" id="nama_mhs" placeholder="Nama" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select name="jk" id="jk" class="form-control">
                  <option value="">P</option>
                  <option value="">L</option>
              </select>
          </div>

          <div class="form-group">
              <label for="">Agama</label>
              <input type="text" name="agama" id="alamat" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Alamat</label>
              <textarea name="alamat" id="alamat" cols="4" rows="4" class="form-control"></textarea>
          </div>

          <div class="form-group">
              <label for="">No.Telepon</label>
              <input type="text" name="notlp" id="notlp" class="form-control">
          </div>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="tambah" id="submit" value="submit"class="btn btn-primary">Simpan</button>
      </div>
      </form>
      <?php
      if ($_POST['tambah']) {
        $nim = $koneksi->conn->real_escape_string($_POST['nim']);
        $nama_mhs = $koneksi->conn->real_escape_string($_POST['nama_mhs']);
        $jk = $koneksi->conn->real_escape_string($_POST['jk']);
        $agama = $koneksi->conn->real_escape_string($_POST['agama']);
        $alamat = $koneksi->conn->real_escape_string($_POST['alamat']);
        $notlp = $koneksi->conn->real_escape_string($_POST['notlp']);
        $mhs->tambah_mhs($nim,$nama_mhs,$jk,$agama,$alamat,$notlp);
        header('location: ?page=mhs');
      }
      
      
      ?>


    </div>
  </div>
</div>