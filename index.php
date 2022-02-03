<?php
require_once('Admin/Config/koneksi.php');
require_once('Admin/Models/database.php');

$koneksi = new Database($host, $user, $pass, $db);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
.jumbotron-dua svg{
    display: block;
    padding: 0;
    position: absolute;
    margin-top: -64px;
    margin-left: -120px;
    margin-right: -20px;
    overflow-x: hidden;
}

    </style>

    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#"><img src="img/gambar.png" alt="" srcset="" height="50px"></a>
        <p class="tulisan"><i>e-rapot</i></p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="#">Pengajar</a>
            <a class="nav-link" href="#">galery</a>
            <a class="nav-link disabled">login</a>
          </div>
        </div>
      </nav>
    <!-- end Navbar -->

<!-- jumbotron satu -->
<section>
    <div class="jumbotron jumbotron-satu">
        <div class="container">
            <div data-aos="zoom-in-up" data-aos-duration="1500">
            <img src="img/gambar.png" alt="" srcset="" height="350px" style="float: right;">
             </div>
             <div data-aos="fade-up-right" data-aos-duration="1500" >
            <h1 class="display-4 font-weight-bold"> Selamat Datang Di <br> e-rapot</h1>
            <p class="lead">Wearnes Education Center</p>
            <a href="login.html"><button class="btn btn-tos">Login</button></a>
        </div>
        </div>
      </div>

</section>
<!-- end jumbotron satu -->



<!-- Pengajar -->
<section>
    <?php
    include 'Admin/Models/m_dosen.php';
    $dosen = new Dosen($koneksi);
    
    ?>
   
  <div class="row ml-2 mb-5 mt-5">
      <?php
      $tampil = $dosen->tampil_dosen();
      while ($data_dosen = $tampil->fetch_object()) {
          # code...
      
      ?>
      <div class="col-lg-3">
          <div class="card card-tos" style="width: 18rem;  background-color:rgb(238, 238, 238) !important; border-radius: 0%;box-shadow: 0 0 15px #111;">
              <img src="Admin/img/dosen/<?php echo $data_dosen->foto;?>" alt="" srcset="" style="height: 250px !important; width: 75%; margin-left: auto; margin-right: auto;margin-top: 5px;">
              <div class="card-body">
                  <p class="text-center"> <b><?php echo $data_dosen->nama;?></b></p>
                  <p class="text-center"> <b><?php echo $data_dosen->kd_dosen;?></b></p>
                  <p class="text-center"> <b><?php echo $data_dosen->notlp;?></b></p>
                  <!-- <button type="button" class="btn btn-block btn-tos" data-toggle="modal" data-target="#exampleModal">
                Detail
              </button> -->

              </div>
          </div>
          


      </div>
      <?php
      }
      ?>
  </div>
</section>

<!-- end Pengajar -->

<!-- siswa -->
<section>
 
<?php
include 'Admin/Models/m_jurusan.php';
$jurusan = new Jurusan($koneksi);
?>
<div class="row mb-5 mt-5 ml-2">
  <?php
  $tampil = $jurusan->tampil_jurusan();
  while ($data_jurusan = $tampil->fetch_object()) {
      # code...
  
  ?>
 
    <div class="col-lg-3">
         
<a href="tampil_kelas.php?id_jurusan=<?php echo $data_jurusan->id_jurusan?>" class="btn btn-dark btn-block"><?php echo $data_jurusan->kd_jurusan;?></a>


 </div>

  <?php
  }
  
  ?>

</div>

</section>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>


<!-- end siswa -->




<!-- galery -->
<section>
    <?php
    include 'Admin/Models/m_galery.php';
    $galery = new Galery($koneksi);
    
    ?>

  
    <div class="row ml-5 mt-5">
      <?php
      $tampil = $galery->tampil_galery();
      while ($data_galery = $tampil->fetch_object()) {
        # code...
      
      
      ?>
      <div class="col-lg-3">
        <img src="Admin/img/galery/<?php echo $data_galery->foto;?>" alt="" srcset="" style="height:200px; width:80%;">
      </div>
      <?php } ?>
    </div>
    
</section>
<!-- end galery -->


<section>
   <div class="jumbotron jumbotron-dua">
   <svg viewBox="0 0 1366 185" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(75, 47, 94, 1)" d="M 0 1 C 277.6 1 416.4 110 694 110 L 694 110 L 694 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(75, 47, 94, 1)" d="M 693 110 C 962.2 110 1096.8 30 1366 30 L 1366 30 L 1366 0 L 693 0 Z" stroke-width="0"></path> </svg>
   <div class="container">
       <div class="row">
           <div class="col text-center">
               <h1 class="about text-center">About Me</h1>
           </div>
        </div>

   <div class="row">
       <div class="col lorem">
           Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
           Tempore sunt explicabo ab dolorem voluptatum! Nesciunt asperiores 
           quidem ab nihil, laboriosam suscipit mollitia praesentium? Voluptatibus
           officia autem impedit veritatis, voluptas tempore!
       </div>

       <div class="col lorem">
       Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
           Tempore sunt explicabo ab dolorem voluptatum! Nesciunt asperiores 
           quidem ab nihil, laboriosam suscipit mollitia praesentium? Voluptatibus
           officia autem impedit veritatis, voluptas tempore!
       </div>
   </div>
</div> 
    
</section>  
<!-- end About me -->


<!-- login -->

<!-- end login -->
<script src="Admin/assets/plugins/jquery/jquery.min.js"></script>
<script src="Admin/assets/plugins/popper/popper.min.js"></script>
  <script language="javascript">
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>


</body>
</html>

<!-- Modal -->
