<?php 
    require_once ('../Config/koneksi.php');
    require_once ('../Models/database.php');

    include '../Models/m_dosen.php';
   
    $koneksi = new Database($host, $user, $pass, $db);

    $dosen = new Dosen($koneksi);
  
    $id_dosen = $_POST['id_dosen'];
    $kd_dosen = $koneksi->conn->real_escape_string($_POST['kd_dosen']);
    $nama = $koneksi->conn->real_escape_string($_POST['nama']);    
    $jk = $koneksi->conn->real_escape_string($_POST['jk']);    
    $alamat = $koneksi->conn->real_escape_string($_POST['alamat']);    
    $notlp = $koneksi->conn->real_escape_string($_POST['notlp']);    

    $pict = $_FILES['foto']['name'];

    $extensi = explode(".",$_FILES['foto']['name']);
    $namabaru = $nama.".".end($extensi);
    $sumber = $_FILES['foto']['tmp_name'];
    

    if( $pict == ''){
        $dosen->ubah_dosen("UPDATE tb_dosen SET kd_dosen='$kd_dosen', nama='$nama', jk='$jk', alamat='$alamat', notlp='$notlp' WHERE id_dosen='$id_dosen'");        
        echo "<script> window.location='?page=dosen';</script>";
    }else{
        $foto_awal = $dosen->tampil_dosen($id_dosen)->fetch_object()->foto;
        unlink('../img/dosen/'.$foto_awal);
        $upload = move_uploaded_file($sumber, '../img/dosen/'.$namabaru);
        if($upload){
            $dosen->ubah_dosen("UPDATE tb_dosen SET kd_dosen='$kd_dosen', nama='$nama', jk='$jk', alamat='$alamat', notlp='$notlp', foto='$namabaru' WHERE id_dosen='$id_dosen'");        
            echo "<script> window.location='?page=dosen';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>