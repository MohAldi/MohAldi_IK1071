<?php
class Matkul
{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil_mat( $id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT a.*,b.* FROM tb_matkul a join tb_dosen b ON b.id_dosen = a.id_dosen";
            if($id !=null){
                   $sql .=" where id_matkul = $id";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;
    }


    public function tambah_matkul($kd_matkul,$nama_matkul,$id_dosen){
        $db = $this->mysqli->conn;
        $sql ="INSERT INTO tb_matkul VALUES ('','$kd_matkul','$nama_matkul','$id_dosen')";
        $db->query($sql) or die ($db->error);

    }
    public function hapus_matkul($id_matkul){
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_matkul WHERE id_matkul='$id_matkul'") or die($db->error);
    }
    public function ubah_matkul($id_matkul,$kd_matkul,$nama_matkul,$id_dosen){
        $db = $this->mysqli->conn;
        $sql ="UPDATE tb_matkul SET kd_matkul='$kd_matkul',nama_matkul='$nama_matkul',id_dosen='$id_dosen' WHERE id_matkul='$id_matkul'";
        $db->query($sql) or die ($db->error);
        

    }



}


?>
