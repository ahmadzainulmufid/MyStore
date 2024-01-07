<?php
    $file = "rizq.json";
    $rizq = file_get_contents($file);
    $data = json_decode($zain, true);

    $newValues = [
        1 => [
            'prodi' => 'Teknik Multimedia Awuu',
            'jurusan' => 'Teknik Komputer aja ya'
        ],
        2 => [
            'prodi' => 'Teknik Mesinin',
            'jurusan' => 'Teknik Mesin'
        ],
        3 => [
            'prodi' => 'Sistem Abadi',
            'jurusan' => 'Teknik Menyeramkan dan Sistem Informasi'
        ],
        4 => [
            'prodi' => 'Teknik Industrikita',
            'jurusan' => 'Teknik Kita'
        ],
        5 => [
            'prodi' => 'Teknik Sipit',
            'jurusan' => 'Teknik Sipitika'
        ],
        6 => [
            'prodi' => 'Desain Komunikasi aja',
            'jurusan' => 'Desain kok Media'
        ],
        7 => [
            'prodi' => 'Manajemen Ayo',
            'jurusan' => 'Manajemen Ayo ga si'
        ]
    ];

    foreach ($data as $key => $d) {
        $no = $d['no'];
        if ($no >= 1 && $no <= 7) {
            $data[$key]['prodi'] = $newValues[$no]['prodi'];
            $data[$key]['jurusan'] = $newValues[$no]['jurusan'];
        }
    }

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    $rizq = file_put_contents($file, $jsonfile);

?>