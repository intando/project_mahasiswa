<?php

include "uts_koneksi.php";
$koneksiObj=new Koneksi();
$koneksi= $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
	die("Konesi Gagal : " . $koneksi->connect_error);
}else{
	echo "Koneksi ke basis data sukses!";
}


$query = "insert into data_mahasiswa(NIM,Nama,Jurusan) 
values('".$_POST['NIM']."','".$_POST['Nama']."', 
'".$_POST['Jurusan']."') ";


//echo "<br><br>".$query;

if($koneksi->query($query)==true){
	echo "<br>Data ".$_POST["Nama"].
	" sudah tersimpan . Data bisa dilihat ".
    '<a href="uts_main.php">disini</a>';

}else {
	echo "error : ".$query." -> ".$koneksi->error;
}

$koneksi->close();
?>
