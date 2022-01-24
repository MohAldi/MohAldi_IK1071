<?php
class Galery{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    public function tampil_galery($id_galery = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_galery";
            if($id_galery != null){
                   $sql .=" where id_galery = $id_galery";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;

    }
    public function tambah_galery($nama,$keterangan,$about,$foto){
        $db = $this->mysqli->conn;
        $sql ="INSERT INTO tb_galery VALUES ('','$nama','$keterangan','$about','$foto')";
        $db->query($sql) or die ($db->error);


    }
    public function hapus_galery($id_galery)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_galery WHERE id_galery='$id_galery'") or die ($db->error);
    }
    
    public function ubah_galery($sql)
        {
            $db = $this->mysqli->conn;
            $db->query($sql) or die ($db->error);
        }

}

?>