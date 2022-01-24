<?php
class n_nilai
{
    private $mysqli;
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil_nilai( $id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_nilai INNER JOIN tb_mhs ON tb_nilai.id_mhs = tb_mhs.id_mhs INNER JOIN tb_matkul ON tb_nilai.id_matkul = tb_matkul.id_matkul INNER JOIN tb_jurusan ON tb_nilai.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_dosen ON tb_nilai.id_dosen = tb_dosen.id_dosen";
            if($id !=null){
                   $sql .=" where id_nilai = $id";
            }
        $query =$db->query($sql) or die ($this->mysqli->conn->error);
        return $query;
    }
    public function tambah_nilai($id_mhs,$id_matkul,$id_dosen,$id_jurusan,$nilai1){
        $db = $this->mysqli->conn;
        $sql ="INSERT INTO tb_nilai VALUE ('','$id_mhs','$id_matkul','$id_dosen','$id_jurusan','$nilai1')";
        $db->query($sql) or die ($db->error);

    }
    public function hapus_nilai($id_nilai){
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_nilai WHERE id_nilai='$id_nilai'") or die($db->error);
    }

    public function ubah_nilai($id_nilai,$id_mhs,$id_matkul,$id_dosen,$id_jurusan,$nilai1){
        $db = $this->mysqli->conn;
        $sql ="UPDATE tb_nilai SET id_mhs='$id_mhs',id_matkul='$id_matkul',id_dosen='$id_dosen',id_jurusan='$id_jurusan', nilai='$nilai1' WHERE id_nilai='$id_nilai'";
        $db->query($sql) or die ($db->error);
        

    }



}



?>