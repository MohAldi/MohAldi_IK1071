<?php
include 'Models/m_dosen.php';

$dosen = new Dosen($koneksi);

?>


<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdosen" class="btn btn-primary">
                 +Tambah Data
              </button>
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Dosen</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No.Telepon</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      $tampil = $dosen->tampil_dosen();
                      while ($data_dosen=$tampil->fetch_object()) {
                          # code...
                      

                      
                      ?>
                  <tr>
                      <td><?= $no++?></td>
                      <td><?= $data_dosen->kd_dosen?></td>
                      <td><?= $data_dosen->nama?></td>
                      <td><?= $data_dosen->jk?></td>
                      <td><?= $data_dosen->alamat?></td>
                      <td><?= $data_dosen->notlp?></td>
                      <td width="20%"><img src="img/dosen/<?= $data_dosen->foto ?>" alt="" srcset=""  width="30%" height="120px" class="img-thumbnail"></td>
                      <td>
                    <a href="" id="ubah_dosen" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_dosen="<?php echo $data_dosen->id_dosen;?>" data-kd_dosen="<?php echo $data_dosen->kd_dosen;?>" data-nama="<?php echo $data_dosen->nama;?>" data-jk="<?php echo $data_dosen->jk;?>" data-alamat="<?php echo $data_dosen->alamat;?>" data-notlp="<?php echo $data_dosen->notlp;?>" data-foto="<?php echo $data_dosen->foto;?>"><i class="far fa-edit"></i></a> <a href="" id="hapus_dosen" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#modalhapus" data-id_dosen="<?php echo $data_dosen->id_dosen;?>"><i class="fas fa-trash"></i></a>
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


<div class="modal fade" id="tambahdosen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="">Kode Dosen</label>
              <input type="text" name="kd_dosen" id="kd_dosen" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <input type="text" name="jk" id="jk" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control">
          </div>

          <div class="form-group">
              <label for="">No.Telepon</label>
              <input type="text" name="notlp" id="notlp" class="form-control">
          </div>

          <div class="form-group">
              <label for="">foto</label>
              <input type="file" name="foto" id="foto" class="form-control">
          </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="tambah" value="simpan" class="btn btn-primary">Simpan</button>
        
      </div>
    
      </form>
      <?php
      if (@$_POST['tambah']) {
          $kd_dosen = $koneksi->conn->real_escape_string($_POST['kd_dosen']);
          $nama = $koneksi->conn->real_escape_string($_POST['nama']);
          $jk = $koneksi->conn->real_escape_string($_POST['jk']);
          $alamat = $koneksi->conn->real_escape_string($_POST['alamat']);
          $notlp = $koneksi->conn->real_escape_string($_POST['notlp']);
          $foto = $koneksi->conn->real_escape_string($_POST['foto']);
          
          
          $extensi = explode(".",$_FILES['foto']['name']);
          $namabaru = $nama.".".end($extensi);
          $sumber = $_FILES['foto']['tmp_name'];

          $upload = move_uploaded_file($sumber, 'img/dosen/'.$namabaru);
          if($upload){
            $dosen->tambah_dosen($kd_dosen,$nama,$jk,$alamat,$notlp,$namabaru);
            header('location: ?page=dosen');
          }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
          }          
      }
      
      ?>
      
     
    </div>
  </div>
</div>

<!-- en tambah data -->


<div class="modal fade" id="modalubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="" method="POST" id="form" enctype="multipart/form-data">
     
      <div class="modal-body">
          <div class="form-group">
              <label for="">Kode Dosen</label>
              <input type="text" name="kd_dosen" id="kd_dosen" class="form-control">
              <input type="text" name="id_dosen" id="id_dosen" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <input type="text" name="jk" id="jk" class="form-control">
          </div>

          <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control">
          </div>

          <div class="form-group">
              <label for="">No.Telepon</label>
              <input type="text" name="notlp" id="notlp" class="form-control">
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
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="tambah" value="simpan" class="btn btn-primary">Simpan</button>
        
      </div>
    
      </form>
      
      
     
    </div>
  </div>
</div>

<!-- en ubah data -->

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
          <input type="text" name="id_dosen" id="id_dosen">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="hapus" id="hapus" value="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>
      <?php
      if(@$_POST['hapus']){
          $id_dosen = $_POST['id_dosen'];
          if($id_dosen != ''){         
            $foto_awal = $dosen->tampil_dosen($id_dosen)->fetch_object()->foto;
            unlink('img/dosen/'.$foto_awal); 
            
            $dosen->hapus_dosen($id_dosen);
            header('location: ?page=dosen');
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

  $(document).on('click','#hapus_dosen',  function(){
    var id_dosen = $(this).data('id_dosen');
    
    $('#modalhapus #id_dosen').val(id_dosen);
  });

  $(document).on('click','#ubah_dosen', function(){
      var id_dosen = $(this).data('id_dosen');
      var kd_dosen = $(this).data('kd_dosen');
      var nama = $(this).data('nama');
      var jk = $(this).data('jk');
      var alamat = $(this).data('alamat');
      var notlp = $(this).data('notlp');
      var foto = $(this).data('foto');

      $('#modalubah #id_dosen').val(id_dosen);
      $('#modalubah #kd_dosen').val(kd_dosen);
      $('#modalubah #nama').val(nama);
      $('#modalubah #jk').val(jk);
      $('#modalubah #alamat').val(alamat);
      $('#modalubah #notlp').val(notlp);
      $('#modalubah #foto').attr("src","img/dosen/"+foto);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'Models/ubah_dosen.php',
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
 