<?php
class Mhs{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil_mhs( $id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_mhs";
            if($id !=null){
                   $sql .=" where id_mhs = $id";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;
    }
    public function tambah_mhs($nim,$nama_mhs,$jk,$agama,$alamat,$notlp){
        $db = $this->mysqli->conn;
        $sql ="INSERT INTO tb_mhs VALUE ('','$nim','$nama_mhs','$jk','$agama','$alamat','$notlp')";
        $db->query($sql) or die ($db->error);

    }

}

?>