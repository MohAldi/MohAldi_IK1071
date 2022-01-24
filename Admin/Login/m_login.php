<?php
class Login{
    private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function LoginUser($kd_dosen, $nama)
        {
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tb_dosen Where kd_dosen='$nama' And nama='$kd_dosen'";     
            $query = $db->query($sql) or die ($db->error);      
           
            return $query;
           
        }

        public function get_sesi()
        {
            return $_SESSION['loginadmin'];
        }

}
?>