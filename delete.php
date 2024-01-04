<?php 
    include 'koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM rahid WHERE id_pembeli ='$id'");
    header("location:index.php");
?>