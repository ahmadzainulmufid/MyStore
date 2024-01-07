<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <?php
    $file = "rizq.json";
    $rizq = file_get_contents($file);
    $data = json_decode($rizq, true);
    ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Prodi</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $d) : ?>
            <tr>
                <td><?php echo $d['no']; ?></td>
                <td><?php echo $d['nim']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['kelas']; ?></td>
                <td><?php echo $d['prodi']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>