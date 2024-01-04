<?php
    $file = "rizq.json";
    $rizq = file_get_contents($file);
    $data = json_decode($zain, true);

    $data[] = array(
        'no' => 11,
        'nim' => 2207412037,
        'nama' => 'nabila',
        'kelas' => 'CCIT 3B',
        'prodi' => 'Teknik Informatika',
        'jurusan' => 'Teknik Informatika dan Komputer'
    );

    $data[] = array(
        'no' => 12,
        'nim' => 2207412052,
        'nama' => 'syah',
        'kelas' => 'CCIT 3B',
        'prodi' => 'Teknik Informatika',
        'jurusan' => 'Teknik Informatika dan Komputer'
    );

    $data[] = array(
        'no' => 13,
        'nim' => 2207412053,
        'nama' => 'dzaki',
        'kelas' => 'CCIT 3B',
        'prodi' => 'Teknik Informatika',
        'jurusan' => 'Teknik Informatika dan Komputer'
    );

    $data[] = array(
        'no' => 14,
        'nim' => 2207412046,
        'nama' => 'angga',
        'kelas' => 'CCIT 3B',
        'prodi' => 'Teknik Informatika',
        'jurusan' => 'Teknik Informatika dan Komputer'
    );

    $data[] = array(
        'no' => 15,
        'nim' => 2207412041,
        'nama' => 'faried',
        'kelas' => 'CCIT 3B',
        'prodi' => 'Teknik Informatika',
        'jurusan' => 'Teknik Informatika dan Komputer'
    );

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    $rizq = file_put_contents($file, $jsonfile);
?>