<h2>Aplikasi Data Mahasiswa</h2>
<hr>
<a href="uts_tambah.php">Tambah Data</a>

<?php
include "uts_koneksi.php";
$koneksiObj=new Koneksi();
$koneksi= $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
	die("Konesi Gagal : " . $koneksi->connect_error);
}//else{
	//echo "Koneksi ke basis data sukses!";
//}

$qry="select * from data_mahasiswa";
$data = $koneksi->query($qry);
 ?>

<table border="1">
  <tr>
    <th>NIM </th>
    <th>Nama </th>
    <th>Jurusan </th>
  </tr>
  <?php

  if ($data -> num_rows <= 0){
    echo "<tr><td>";
    echo "DATA NIHIL";
    echo "</td></tr>";
  }else {
    while ($row = $data -> fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row["NIM"]."</td>";
      echo "<td>".$row["Nama"]."</td>";
      echo "<td>".$row["Jurusan"]."</td>";
	    echo '<td><a href="uts_edit_form.php?NIM=' .
        $row["NIM"]. '"">Ubah</a>';
      echo '<td><a href="uts_hapus.php?NIM=' .
		    $row["NIM"]. '"">Hapus</a>';
      echo "</tr>";
    }
  }
    ?>

</table>
