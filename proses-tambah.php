<?php

include '../koneksi.php';

if(isset($_POST['simpan']))
{
    $judul = $_POST['judul'];
    $stok = $_POST['stok'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_level = 3;
    $sql = "INSERT INTO buku (judul, stok, telp, username, password, id_level)
            VALUES ('$judul', '$stok', '$telp', '$username', '$password', $id_level)";
    
    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

if($count == 1)
{
    header("Location: index.php");
 }
 else 
 {
    header("Location: tambah.php");
 }
}
?>