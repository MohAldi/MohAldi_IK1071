<?php
class Dosen{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    

    public function tampil_dosen( $id_dosen = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_dosen";
            if($id_dosen !=null){
                   $sql .=" where id_dosen = $id_dosen";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;
    }

    public function tambah_dosen($kd_dosen, $nama,$jk,$alamat,$notlp,$foto){
        $db = $this->mysqli->conn;
        $sql ="INSERT INTO tb_dosen VALUES ('','$kd_dosen','$nama','$jk','$alamat','$notlp','$foto')";
        $db->query($sql) or die ($db->error);

    }

    public function hapus_dosen($id_dosen)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_dosen WHERE id_dosen='$id_dosen'") or die ($db->error);
    }
    public function ubah_dosen($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }


}

?>