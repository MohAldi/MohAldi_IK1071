<?php
class Jurusan{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil_jurusan( $id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_jurusan";
            if($id !=null){
                   $sql .=" where id_jurusan = $id";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;
    }
   public function tampil_kelas($id_jurusan){

    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM tb_kelas INNER JOIN tb_mhs ON tb_kelas.id_mhs = tb_mhs.id_mhs INNER JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan WHERE tb_jurusan.id_jurusan='$id_jurusan'";
    $query =$db->query($sql) or die ($this->mysqli->conn->error);
    return $query;

   }


 

}

?>