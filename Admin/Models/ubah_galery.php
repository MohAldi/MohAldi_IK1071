<?php 
    require_once ('../Config/koneksi.php');
    require_once ('../Models/database.php');

    include '../Models/m_galery.php';
   
    $koneksi = new Database($host, $user, $pass, $db);

    $galery = new Galery($koneksi);
  
    $id_galery = $_POST['id_galery'];
    $nama = $koneksi->conn->real_escape_string($_POST['nama']);
    $keterangan = $koneksi->conn->real_escape_string($_POST['keterangan']);    
    $about = $koneksi->conn->real_escape_string($_POST['about']);    

    $pict = $_FILES['foto']['name'];

    $extensi = explode(".",$_FILES['foto']['name']);
    $namabaru = $nama.".".end($extensi);
    $sumber = $_FILES['foto']['tmp_name'];
    

    if( $pict == ''){
        $galery->ubah_galery("UPDATE tb_galery SET nama='$nama', keterangan='$keterangan',about='$about' WHERE id_galery='$id_galery'");        
        echo "<script> window.location='?page=galery';</script>";
    }else{
        $foto_awal = $galery->tampil_galery($id_galery)->fetch_object()->foto;
        unlink('../img/galery/'.$foto_awal);
        $upload = move_uploaded_file($sumber, '../img/galery/'.$namabaru);
        if($upload){
            $galery->ubah_galery("UPDATE tb_galery SET nama='$nama', keterangan='$keterangan',about='$about', foto='$namabaru' WHERE id_galery='$id_galery'");        
            echo "<script> window.location='?page=galery';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>