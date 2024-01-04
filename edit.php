<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Pembelian</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Use the correct Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Use the correct Bootstrap and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
    body {
        background-color: #3498db;
        /* Blue background color */
        color: #fff;
        /* White text color */
    }

    .container {
        max-width: 1000px;
        margin: 100px auto;
        background-color: rgba(255, 255, 255, 0.8);
        /* Semi-transparent white background */
        padding: 20px;
        border-radius: 10px;
    }

    .card-header {
        background-color: #007bff;
        /* Bootstrap Primary Color */
        color: #fff;
        /* White text color */
        text-align: center;
        padding: 10px;
        font-size: 24px;
        margin-bottom: 20px;
        border-radius: 5px 5px 0 0;
    }

    .form-group {
        margin-bottom: 20px;
        color: black;
        /* Black text color for labels */
    }

    .radio-group {
        display: flex;
        margin-top: 10px;
        color: black;
        /* Black text color for radio buttons */
    }

    .radio-group input {
        margin-right: 5px;
    }

    .btn-group {
        display: flex;
        justify-content: space-around;
    }

    .btn-primary,
    .btn-secondary {
        border-radius: 5px;
        text-decoration: none;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        color: #fff;
        /* White text color for buttons */
    }

    .btn-primary {
        background-color: #007bff;
        /* Bootstrap Primary Color */
    }

    .btn-secondary {
        background-color: #6c757d;
        /* Bootstrap Secondary/Gray Color */
    }
    </style>
</head>

<body>

    <?php
    include 'koneksi.php';
    $id_pembeli = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM rahid WHERE id_pembeli='$id_pembeli'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <div class="container">
        <div class="card-header">
            Edit Pembelian
        </div>
        <form method="post" action="update.php">
            <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>">
            <div class="form-group">
                <label for="nama" class="control-label">Nama</label>
                <input type="text" name="nama" value="<?php echo $d["nama"]; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat" class="control-label">Alamat</label>
                <textarea name="alamat" rows="4" class="form-control"><?php echo $d["alamat"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="hp" class="control-label">Nomer Handphone</label>
                <input type="text" name="hp" value="<?php echo $d["hp"]; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="tgl_transaksi" class="control-label">Tanggal Transaksi</label>
                <input type="date" name="tgl_transaksi" class="form-control" value="<?php echo $d['tgl_transaksi']; ?>">
            </div>
            <div class="form-group">
                <label for="jenis_barang" class="control-label">Jenis Barang</label>
                <select name="jenis_barang" class="form-control">
                    <option value="Elektronik" <?php if ($d["jenis_barang"] == "Elektronik") echo "selected"; ?>>
                        Elektronik
                    </option>
                    <option value="Buku" <?php if ($d["jenis_barang"] == "Buku") echo "selected"; ?>>Buku</option>
                    <option value="Fashion" <?php if ($d["jenis_barang"] == "Fashion") echo "selected"; ?>>
                        Fashion</option>
                    <option value="Kesehatan dan Kecantikan"
                        <?php if ($d["jenis_barang"] == "Kesehatan dan Kecantikan") echo "selected"; ?>>
                        Kesehatan dan Kecantikan</option>
                    <option value="Ramah dan Dekorasi"
                        <?php if ($d["jenis_barang"] == "Ramah dan Dekorasi") echo "selected"; ?>>Ramah dan
                        Dekorasi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_barang" class="control-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $d["nama_barang"]; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah" class="control-label">Jumlah Pembelian</label>
                <input type="text" name="jumlah" value="<?php echo $d["jumlah"]; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="harga" class="control-label">Harga Pembelian</label>
                <input type="text" name="harga" value="<?php echo $d["harga"]; ?>" class="form-control">
            </div>
            <div class="btn-group">
                <input type="submit" value="Save" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
    <?php
    }
    ?>
</body>

</html>