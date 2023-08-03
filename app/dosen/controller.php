<?php
require "../../config/config_database.php";
$db = koneksi (hostname, username, password, database);

$nama = $_POST['nama'];
$nomer_induk = $_POST['NIDN'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = $db->query("insert into dosen (nama, NIDN, alamat, jenis_kelamin)
values ('$nama','$NIDN','$alamat','$jenis_kelamin')");
if($query){
    echo "<script>
    alert('Data sukses disimpan');
    window.location.href='list_murid.php';
    </script>";
}
else{
    echo "<script>
    alert('Data gagal disimpan');
    window.location.href='form.php';
    </script>";
}