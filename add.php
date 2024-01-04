<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pembelian</title>
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

    .card {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 50px;
        margin-top: 100px;
        margin-left: 100px;
        margin-bottom: 100px;
        width: 1000px;
    }

    .btn-group {
        display: flex;
        justify-content: space-around;
    }

    label,
    input,
    textarea,
    select {
        color: #000 !important;
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Formulir Pembelian</h2>
                    </div>

                    <div class="card-body">
                        <?php
                        session_start();
                        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                            echo '<div class="alert alert-danger">';
                            foreach ($_SESSION['errors'] as $error) {
                                echo '<p>' . $error . '</p>';
                            }
                            echo '</div>';
                            unset($_SESSION['errors']);
                        }
                        ?>

                        <form method="post" action="insert.php" onsubmit="return sendData()">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="4"
                                    placeholder="Masukkan Alamat"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nomer Handphone</label>
                                <input type="text" class="form-control" name="hp" id="hp">
                            </div>

                            <div class="form-group">
                                <label for="tgl_transaksi">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi">
                            </div>

                            <div class="form-group">
                                <label for="jenis_barang">Jenis Barang</label>
                                <select class="form-control" name="jenis_barang" id="jenis_barang">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Buku">Buku</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Kesehatan dan Kecantikan">Kesehatan dan Kecantikan</option>
                                    <option value="Ramah dan Dekorasi">Ramah dan Dekorasi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah Pembelian</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah">
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga Pembelian</label>
                                <input type="text" class="form-control" name="harga" id="harga">
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="index.php" class="btn btn-secondary btn-back">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
    function sendData() {
        var xhr = new XMLHttpRequest();
        var url = "https://jsonplaceholder.typicode.com/posts";

        var data = JSON.stringify({
            nama: document.getElementById("nama").value,
            alamat: document.getElementById("alamat").value,
            hp: document.getElementById("hp").value,
            tgl_transaksi: document.getElementById("tgl_transaksi").value,
            jenis_barang: document.getElementById("jenis_barang").value,
            nama_barang: document.getElementById("nama_barang").value,
            jumlah: document.getElementById("jumlah").value,
            harga: document.getElementById("harga").value
        });

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onload = function() {
            console.log(this.responseText);
        };

        xhr.send(data);
        return false;
    }
    </script> -->
</body>

</html>