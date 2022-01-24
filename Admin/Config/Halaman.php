<?php
error_reporting(0);
if ($_GET['page']=='dashboard') {
    include 'Halaman/Dasboard/dashboard.php';
}elseif ($_GET['page']=='Inforkom') {
    include 'Halaman/kelas/inforkom.php';
}elseif ($_GET['page']=='degrakom') {
    include 'Halaman/kelas/degrakom.php';
}
elseif ($_GET['page']=='kasimapr') {
    include 'Halaman/kelas/kasimapr.php';
}elseif ($_GET['page']=='ks') {
    include 'Halaman/kelas/ks.php';
}elseif ($_GET['page']=='dm') {
    include 'Halaman/kelas/dm.php';
}elseif ($_GET['page']=='inforkomn') {
    include 'Halaman/Nilai/inforkomn.php';
}
elseif ($_GET['page']=='degrakomn') {
    include 'Halaman/Nilai/degrakom.php';
 }
elseif ($_GET['page']=='kasimaprn') {
     include 'Halaman/Nilai/kasimapr.php';
}
 elseif ($_GET['page']=='ksn') {
  include 'Halaman/Nilai/ks.php';
}
 elseif ($_GET['page']=='dmn') {
  include 'Halaman/Nilai/dm.php';
}elseif ($_GET['page']=='matkul') {
    include 'Halaman/Matkul/matkul.php'; 
}elseif ($_GET['page']=='mhs') {
    include 'Halaman/Mhs/mhs.php'; 
}elseif ($_GET['page']=='galery') {
    include 'Halaman/Galery/galery.php'; 
}elseif ($_GET['page']=='dosen') {
    include 'Halaman/Dosen/dosen.php'; 
}


?>