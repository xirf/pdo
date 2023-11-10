<?php
include 'koneksi.php';

$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleIndex.css">
    <!-- cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1>Data Pegawai | PT. Tawa Bersama</h1>
    <p>
        Pengolahan data:
    </p>
    <hr>
    <p>Selamat Datang</p>
    <hr>
    <h2>Data Pegawai</h2>

    <a href="tambah.php">Tambah Data
        <i class="fa-solid fa-circle-plus"></i>
    </a>
    <table border="1">
        <thead>
            <th>No.</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Lahir</th>
            <th>Foto</th>
            <th>Keterangan</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $query = $conn->prepare("SELECT * FROM karyawan");
            $query->execute();
            while ($result = $query->fetch(PDO::FETCH_OBJ)) {
            ?>
                <tr>
                    <td><?= ++$no; ?>.</td>
                    <td><?= $result->nama_pegawai; ?></td>
                    <td><?= $result->tgl_lahir; ?></td>
                    <td><img src="image/<?= $result->foto; ?>" alt=""></td>
                    <td><?= $result->keterangan; ?></td>
                    <td>
                        <?php
                        $q = $conn->prepare("SELECT * FROM jabatan WHERE id_jabatan = :idJabatan");
                        $q->bindParam(":idJabatan", $result->id_jabatan, PDO::PARAM_INT); // Assuming id_jabatan is an integer
                        $q->execute();

                        // Fetch and display the result
                        $jabatan = $q->fetch(PDO::FETCH_ASSOC);
                        if ($jabatan) {
                            echo $jabatan['nama_jabatan'];
                        } else {
                            echo "Tidak Memiliki Jabatan";
                        }

                        ?>
                    </td>
                    <td>
                        <a href="edit.php?ubah=<?= $result->id_pegawai; ?>">
                            <i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="hapus.php?hapus=<?= $result->id_pegawai; ?>">
                            <i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>