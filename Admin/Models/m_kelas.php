<?php
class Kelas
{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tambah_kelas($kd_kelas,$id_mhs,$id_jurusan){
        $db = $this->mysqli->conn;
        $sql ="INSERT INTO tb_kelas VALUES ('','$kd_kelas','$id_mhs','$id_jurusan')";
        $db->query($sql) or die ($db->error);

    }
    public function hapus_kelas($id_kelas){
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'") or die($db->error);
    }

    public function ubah_kelas($id_kelas,$kd_kelas,$id_mhs,$id_jurusan){
        $db = $this->mysqli->conn;
        $sql ="UPDATE tb_kelas SET kd_kelas='$kd_kelas',id_mhs='$id_mhs',id_jurusan='$id_jurusan' WHERE id_kelas='$id_kelas'";
        $db->query($sql) or die ($db->error);
        

    }

}

?>