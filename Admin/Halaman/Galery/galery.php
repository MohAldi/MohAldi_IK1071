<?php
include 'Models/m_galery.php';

$galery = new Galery($koneksi);

?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahkelas" class="btn btn-primary">
                 +Tambah Data
              </button>
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>About</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=1;
                      $tampil=$galery->tampil_galery();
                      while ($data_galery=$tampil->fetch_object()) {
                          # code...
                      
                      ?>
                  <tr>
                   <td><?= $no++?></td>
                   <td><?=$data_galery->nama?></td>
                   <td><?=$data_galery->keterangan?></td>
                   <td><?=$data_galery->about?></td>
                   <td width="20%"><img src="img/galery/<?= $data_galery->foto?>" alt="" srcset="" width="40%" class="img-thumbnail"></td>
                   <td>
                    <a href="" id="ubah_galery" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_galery="<?php echo $data_galery->id_galery;?>" data-nama="<?php echo $data_galery->nama;?>" data-keterangan="<?php echo $data_galery->keterangan;?>" data-about="<?php echo $data_galery->about;?>" data-foto="<?php echo $data_galery->foto;?>"><i class="far fa-edit"></i></a> <a href="" id="hapus_galery" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#modalhapus" data-id_galery="<?php echo $data_galery->id_galery;?>"><i class="fas fa-trash"></i></a>
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


          <!-- Modal Tambah data -->
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
              <label for="">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control"> 
          </div>

          <div class="form-group">
              <label for="">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="3" rows="4" class="form-control"></textarea>
          </div>

          <div class="form-group">
              <label for="">About</label>
              <textarea name="about" id="about" cols="3" rows="4" class="form-control"></textarea>
          </div>
        
          <div class="form-group">
              <label for="">Foto</label>
              <input type="file" name="foto" id="foto" class="form-control">
          </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="tambah" value="simpan" class="btn btn-primary">Simpan</button>
        
      </div>
    
      </form>
      
      <!-- proses -->
      <?php
       if(@$_POST['tambah']){
          $nama = $koneksi->conn->real_escape_string($_POST['nama']);
          $keterangan = $koneksi->conn->real_escape_string($_POST['keterangan']);
          $about = $koneksi->conn->real_escape_string($_POST['about']);
          $foto = $koneksi->conn->real_escape_string($_POST['foto']);

          $extensi = explode(".",$_FILES['foto']['name']);
          $namabaru = $nama.".".end($extensi);
          $sumber = $_FILES['foto']['tmp_name'];

          $upload = move_uploaded_file($sumber, 'img/galery/'.$namabaru);
          if($upload){
            $galery->tambah_galery($nama,$keterangan,$about,$namabaru);
            header('location: ?page=galery');
          }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
          }          
       }
      ?>
     
      <!-- end Proses tambah -->
    </div>
  </div>
</div>

<!-- en Tambah data -->

<!-- modal ubah -->
<div class="modal fade" id="modalubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Rubah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="form" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Galery" required>
                <input type="text" name="id_galery" id="id_galery">
              </div>
            </div>
            <div class="form-group row">
              <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-9">
                <textarea rows="2" cols="50" class="form-control" id="keterangan" name="keterangan" required></textarea>
              </div>
            </div>    

            <div class="form-group row">
              <label for="ket" class="col-sm-3 col-form-label">About</label>
              <div class="col-sm-9">
                <textarea rows="2" cols="50" class="form-control" id="about" name="about" required></textarea>
              </div>
            </div>    


            <div class="form-group row">
              <label for="foto" class="col-sm-2 col-form-label">Foto</label>
              <div style="padding-bottom:5px;">
                <img src="" alt="" width="80px" id="foto" class="img-thumbnail">
              </div>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto">
              </div>
            </div>     
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="ubah" name="ubah" value="simpan" class="btn btn-primary">Simpan</button>
        </div>
      </form>      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- hapus -->
<div class="modal" id="modalhapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
          <input type="text" name="id_galery" id="id_galery">
          <p>Apakah Anda Yakin Untuk ??</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="hapus" id="hapus" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>
      <?php
       if(@$_POST['hapus']){
          $id_galery = $_POST['id_galery'];
          if($id_galery != ''){         
            $foto_awal = $galery->tampil_galery($id_galery)->fetch_object()->foto;
            unlink('img/galery/'.$foto_awal); 
            
            $galery->hapus_galery($id_galery);
            header('location: ?page=galery');
          }else {
            echo "<script>alert('Hapus Gagal Broo..!')</script>";
          }          
       }
      ?>  
    </div>
  </div>
</div>
<!-- end hapus -->


<!-- jQuery -->
<script src="Assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">

  $(document).on('click','#hapus_galery',  function(){
    var id_galery = $(this).data('id_galery');
    
    $('#modalhapus #id_galery').val(id_galery);
  });

  $(document).on('click','#ubah_galery', function(){
      var id_galery = $(this).data('id_galery');
      var nama = $(this).data('nama');
      var keterangan = $(this).data('keterangan');
      var about = $(this).data('about');
      var foto = $(this).data('foto');

      $('#modalubah #id_galery').val(id_galery);
      $('#modalubah #nama').val(nama);
      $('#modalubah #keterangan').val(keterangan);
      $('#modalubah #about').val(about);
      $('#modalubah #foto').attr("src","img/galery/"+foto);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'Models/ubah_galery.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(pesan){
          $('.table').html(pesan);
        }
      })
    })
    )
  });

 


</script>
 