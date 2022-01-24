<?php
class n_Degrakom
{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil_degrakom( $id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_nilai INNER JOIN tb_mhs ON tb_nilai.id_mhs = tb_mhs.id_mhs INNER JOIN tb_matkul ON tb_nilai.id_matkul = tb_matkul.id_matkul INNER JOIN tb_jurusan ON tb_nilai.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_dosen ON tb_nilai.id_dosen = tb_dosen.id_dosen WHERE kd_jurusan='Degrakom'";
            if($id !=null){
                   $sql .=" where id_kelas = $id";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;
    }
}



?>