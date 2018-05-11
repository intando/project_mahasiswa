<h2>Form Tambah Data / Ubah data</h2>

<hr>
<form action="uts_update.php" method="post"> 


<?php
include "uts_koneksi.php";
$koneksiObj = new koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
    die("koneksi gagal : " . $koneksi->connect_error);
}

$query ="select * from data_mahasiswa where NIM='".
    $_GET["NIM"] . "'";
$data = $koneksi ->query($query);

if ($data->num_rows <= 0) {
    echo "Isi datanya dengan sesuai ya!";
}else{
    while($hasil = $data->fetch_assoc()){
        global $nama;
        global $jurusan;
        $nama = $hasil["Nama"];
        $jurusan = $hasil["Jurusan"];
    }
}
?>

<table>
<tr>

    <td>NIM </td>
    <td> : <input type="text" name="NIM"></td>
</tr>
<tr>
    <td>NAMA </td>
    <td> : <input type="text" name="Nama"></td>
</tr>
<tr>
    <td>JURUSAN </td>
    <td> : <input type ="text" name="Jurusan"></td>
</tr>
<tr>
    <td><input type="submit" value="simpan"></td>
<tr>
</table>
</form>
