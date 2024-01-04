<?php 
    include 'koneksi.php';

    $id_pembeli = $_POST['id_pembeli'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $tgl_transaksi= $_POST['tgl_transaksi'];
    $jenis_barang = $_POST['jenis_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "UPDATE rahid SET nama='$nama', alamat='$alamat', hp='$hp', tgl_transaksi='$tgl_transaksi', nama_barang='$nama_barang', jenis_barang='$jenis_barang', jumlah='$jumlah', harga='$harga' WHERE id_pembeli='$id_pembeli'");
    header("location: index.php");
?>