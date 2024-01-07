<?php
    include 'koneksi.php';
    session_start();

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $jumlahData = 7;
                
    if (is_numeric($search)) {
        $condition = "id_pembeli = $search";
        } else {
            $condition = "nama LIKE '%$search%'";
        }

    $totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM rahid WHERE $condition"));

    $jumlahPagination = ceil($totalData / $jumlahData);

    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $dataAwal = ($jumlahData * $halamanAktif) - $jumlahData;
    $jumlahLink = 3;
    $start_number = max(1, $halamanAktif - $jumlahLink);
    $end_number = min($jumlahPagination, $halamanAktif + $jumlahLink);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pembelian</title>
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
        margin: 0;
    }

    .container {
        width: 80%;
        margin: 1 auto;
    }

    header {
        background: #333;
        color: #fff;
        padding: 10px 0;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo h1 {
        margin: 0;
        font-size: 24px;
    }

    .menu ul {
        list-style: none;
        display: flex;
        justify-content: space-between;
        /* Memberikan ruang di antara Home dan Pembelian */
    }

    .menu ul li {
        margin-right: 100px;
    }

    .menu ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .menu ul li a:hover {
        color: #ccc;
    }

    .user-actions {
        display: flex;
        align-items: center;
    }

    .btn-logout {
        background-color: red;
        color: #fff;
        padding: 8px 16px;
        border-radius: 3px;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
        margin-right: 20px;
    }

    .btn-logout {
        margin-right: 0;
    }

    .btn-logout:hover {
        background-color: #fff;
    }


    .card {
        background-color: #ffffff;
        border-radius: 0px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        margin-bottom: 50px;
    }


    h2 {
        color: #007bff;
        text-align: center;
        /* Center the text */
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning,
    .btn-danger {
        color: #ffffff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
    }

    .options {
        display: block;
        justify-content: space-around;
    }

    .btn-options {
        margin-top: 10px;
    }

    .form-inline {
        display: flex;
        justify-content: space-between;
        /* Align items horizontally */
    }

    .search-form {
        display: flex;
        margin-bottom: 10px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .pagination-link {
        margin: 0 5px;
        /* Atur sesuai kebutuhan spasi horizontal */
        text-decoration: none;
        color: #007bff;
        /* Warna link normal */
        border: 1px solid #007bff;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .pagination-link.current-page {
        background-color: red;
        color: white;
        /* Warna link untuk halaman aktif */
        font-weight: bold;
    }
    </style>

</head>

<body>
    <header style="background-color: #007bff; padding: 10px 0;">
        <div class="container">
            <div class="header-content" style="display: flex; justify-content: space-between; align-items: center;">
                <div class="logo">
                    <h1 style="margin: 0; color: #fff;">My Store</h1>
                </div>
                <div class="user-actions">
                    <div class="menu">
                        <ul style="margin: 0;">
                            <li><a href="home1.php" style="color: #fff; text-decoration: none;">Home</a></li>
                            <li><a href="index.php" style="color: #fff; text-decoration: none;">List Pembelian</a></li>
                        </ul>
                    </div>
                    <div class="user-auth">
                        <a href="logout.php" class="btn-logout"
                            style="background-color: #ff0000; color: #fff; text-decoration: none; padding: 5px 15px; border-radius: 3px;">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Pembeli Yang Sudah Terdaftar</h2>
                <br>

                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <a href="add.php" class="btn btn-primary">&#43; Pendaftaran Pembelian Baru</a>
                    </div>
                    <div>
                        <form action="" method="GET" class="form-inline">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </form>
                    </div>
                </div>
                <?php if ($totalData > 0) : ?>
                <?php if (!empty($searchMessage)) : ?>
                <p><?php echo $searchMessage; ?></p>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomer Handphone</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ambildata_perhalaman = mysqli_query($koneksi, "SELECT * FROM rahid 
                            WHERE $condition LIMIT $dataAwal, $jumlahData");

                        $no = 1 + $dataAwal;
                        while ($d = mysqli_fetch_array($ambildata_perhalaman)) :
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td><?php echo $d['hp']; ?></td>
                            <td><?php echo $d['tgl_transaksi']; ?></td>
                            <td><?php echo $d['jenis_barang']; ?></td>
                            <td><?php echo $d['nama_barang']; ?></td>
                            <td><?php echo $d['jumlah']; ?></td>
                            <td><?php echo "Rp " . number_format($d['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo "Rp " . number_format($d['jumlah'] * $d['harga'], 0, ',', '.'); ?></td>
                            <td class="options">
                                <a href="detail.php?id=<?php echo $d['id_pembeli']; ?>"
                                    class="btn btn-primary btn-options">Detail</a>
                                <a href="edit.php?id=<?php echo $d['id_pembeli']; ?>"
                                    class="btn btn-warning btn-options">Update</a>
                                <span style="margin: 0 5px;"></span>
                                <a href="delete.php?id=<?php echo $d['id_pembeli']; ?>"
                                    class="btn btn-danger btn-options">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div class="pagination">
                    <?php if ($halamanAktif > 1) : ?>
                    <a href="?halaman=<?php echo $halamanAktif - 1 ?>&search=<?php echo $search; ?>"
                        class="pagination-link">
                        &laquo; Prev
                    </a>
                    <?php endif; ?>
                    <?php for ($i = $start_number; $i <= $end_number; $i++) : ?>
                    <?php if ($halamanAktif == $i) : ?>
                    <a href="?halaman=<?php echo $i; ?>&search=<?php echo $search; ?>"
                        class="pagination-link current-page">
                        <?php echo $i; ?>
                    </a>
                    <?php else : ?>
                    <a href="?halaman=<?php echo $i; ?>&search=<?php echo $search; ?>" class="pagination-link">
                        <?php echo $i; ?>
                    </a>
                    <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanAktif < $jumlahPagination) : ?>
                    <a href="?halaman=<?php echo $halamanAktif + 1 ?>&search=<?php echo $search; ?>"
                        class="pagination-link">
                        Next &raquo;
                    </a>
                    <?php endif; ?>
                </div>
                <?php else : ?>
                <p>Tidak ada data yang ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>