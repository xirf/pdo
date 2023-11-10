<?php 
include 'koneksi.php';
if(!isset($_GET['ubah'])){
    die("Error: id_pegawai not found");
}

$query = $conn->prepare("SELECT * FROM `karyawan` WHERE id_pegawai = :id_pegawai");
$query -> bindParam(":id_pegawai", $_GET['ubah']);
$query->execute();

if($query->rowCount() == 0){
    die("Error: ID tidak ditemukan");
} else{
    $data = $query->fetch();
}

if(isset($_POST['submit'])){
    $nama_pegawai = htmlentities($_POST['nama_pegawai']);
    $tgl_lahir = htmlentities($_POST['tgl_lahir']);
    $foto = htmlentities($_POST['foto']);
    $keterangan = htmlentities($_POST['keterangan']);
    $query = $conn->prepare("UPDATE `karyawan` SET `nama_pegawai`=:nama_pegawai, `tgl_lahir`=:tgl_lahir, `foto`=:foto, `keterangan` =:keterangan WHERE `id_pegawai`=:id_pegawai");

    $query->bindParam(":nama_pegawai", $nama_pegawai);
    $query->bindParam(":tgl_lahir", $tgl_lahir);
    $query->bindParam(":foto", $foto);
    $query->bindParam(":keterangan", $keterangan);
    $query->bindParam(":id_pegawai", $_GET['ubah']);
    $query->execute();
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="styleEdit.css">
    <!-- Start Font Awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End Font Awasome -->
</head>
<body>
    <h1>Ubah Data</h1>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
        <label>
            Nama Pegawai:
            <input type="text" name="nama_pegawai" value="<?= $data['nama_pegawai'];?>">
        </label>
        <br>
        <label>
            Tanggal Lahir:
            <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'];?>">
        </label>
        <br>
        <label>
            Foto
            <input type="file" name="foto">
        </label>
        <br>
        <label>
            <img src="image/<?=$data['foto'];?>">
        </label>
        <br>
        <label>
            Keterangan
            <input type="text" name="keterangan" value="<?= $data['keterangan'];?>">
        </label>
        <br>
        <div id="aksi">
        <a href="index.php"><i class="fa-solid fa-arrow-left-long"></i></a>
        <button type="submit" name="submit">Ubah</button>
        </div>
        </form>
    </div>
</body>
</html>