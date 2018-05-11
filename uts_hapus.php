<?php

include "uts_koneksi.php";
$koneksiObj=new Koneksi();
$koneksi= $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
	die("Konesi Gagal : " . $koneksi->connect_error);
}else{
	echo "Koneksi ke basis data sukses!";
}


$query = "delete from data_mahasiswa where NIM = " . 
        $_GET["NIM"];
        

if($koneksi->query($query)==true){
    echo "<br>Data dengan NIM " . $_GET["NIM"] . 
    " sudah DIHAPUS. Data bisa dilihat " . 
    '<a href="uts_main.php">disini</a>';
}else {
    echo "error : ".$query." -> ".$koneksi->error;
}

$koneksi->close();
?>