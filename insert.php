<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["hp"];
    $tgl_transaksi = $_POST["tgl_transaksi"];
    $jenis_barang = $_POST["jenis_barang"];
    $nama_barang = $_POST["nama_barang"];
    $jumlah = $_POST["jumlah"];
    $harga = $_POST["harga"];
    $errors = array();

    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $errors[] = "Nama hanya boleh berisi huruf dan spasi";
    } elseif (strlen($nama) > 25) {
        $errors[] = "Nama tidak boleh lebih dari 25 karakter";
    }


    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong";
    }

    if(empty($hp)) {
        $errors[] = "Nomer HP tidak boleh kosong";
    }

    if (empty($tgl_transaksi)) {
        $errors[] = "Tanggal Transaksi tidak boleh kosong";
    }

    if (empty($jenis_barang)) {
        $errors[] = "Pilih jenis barang";
    }

    if (empty($nama_barang)) {
        $errors[] = "Nama Barang tidak boleh kosong";
    }

    if (empty($jumlah)) {
        $errors[] = "Jumlah tidak boleh kosong";
    }

    if(empty($harga)) {
        $errors[] = "Harga tidak boleh kosong";
    }

    if (empty($errors)) {
        // Check if the name is already registered
        $result = $koneksi->query("SELECT * FROM rahid WHERE nama = '$nama'");

        if ($result->num_rows > 0) {
            $errors[] = "Nama sudah terdaftar";
            session_start();
            $_SESSION['errors'] = $errors;
            header("Location: add.php");
        } else {
            // Insert the data including Total_Bayar
            $sql = "INSERT INTO zainul (nama, alamat, hp, tgl_transaksi, jenis_barang, nama_barang, jumlah, harga) VALUES ('$nama', '$alamat', '$hp', '$tgl_transaksi', '$jenis_barang', '$nama_barang', '$jumlah', '$harga')";

            if ($koneksi->query($sql) === TRUE) {
                // Data successfully inserted
                header("Location: index.php");
            } else {
                $errors[] = "Error: " . $sql . "<br>" . $koneksi->error;
                session_start();
                $_SESSION['errors'] = $errors;
                header("Location: add.php");
            }
        }
    } else {
        session_start();
        $_SESSION['errors'] = $errors;
        header("Location: add.php");
    }
}

$koneksi->close();
    ?>