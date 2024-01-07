<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Pembelian</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Use the correct Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Use the correct Bootstrap and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
    body {
        background-color: #3498db;
    }

    .card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        margin-bottom: 50px;
    }

    h2 {
        color: #007bff;
        text-align: center;
        /* Center the text */
    }

    .barcode {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    </style>

    <script>
    function printPage() {
        window.print();
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Detail Pembelian</h2>
                <br>

                <?php
                include 'koneksi.php';
                session_start();

                // Mendapatkan ID dari URL
                $id_pembeli = $_GET['id'];

                // Query untuk mendapatkan data pembeli berdasarkan ID
                $query = "SELECT * FROM rahid WHERE id_pembeli = '$id_pembeli'";
                $result = mysqli_query($koneksi, $query);
                $data = mysqli_fetch_assoc($result);
                ?>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><?php echo $data['nama']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $data['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomer Handphone</th>
                            <td><?php echo $data['hp']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <td><?php echo $data['tgl_transaksi']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Barang</th>
                            <td><?php echo $data['jenis_barang']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td><?php echo $data['nama_barang']; ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><?php echo $data['jumlah']; ?></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td><?php echo "Rp " . number_format($data['harga'], 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td><?php echo "Rp " . number_format($data['jumlah'] * $data['harga'], 0, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="index.php" class="btn btn-primary">Kembali</a>
                    <button class="btn btn-primary" onclick="printPage()">Print</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>