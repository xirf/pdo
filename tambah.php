<?php 
include 'koneksi.php';
if(isset($_POST['submit'])){
    $nama_pegawai = htmlentities($_POST['nama_pegawai']);
    $tgl_lahir = htmlentities($_POST['tgl_lahir']);
    $foto = htmlentities($_POST['foto']);
    $keterangan = htmlentities($_POST['keterangan']);
    $query = $conn->prepare("INSERT INTO `karyawan` (`nama_pegawai`, `tgl_lahir`, `foto`, `keterangan`)
    VALUES(:nama_pegawai, :tgl_lahir, :foto, :keterangan)");

    $query->bindParam(":nama_pegawai", $nama_pegawai);
    $query->bindParam(":tgl_lahir", $tgl_lahir);
    $query->bindParam(":foto", $foto);
    $query->bindParam(":keterangan", $keterangan);
    $query->execute();
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <!-- Start Font Awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End Font Awasome -->
</head>
<body>

<h1>Halaman Tambah Data</h1>

<form action="#" method="post">
    <label>
        Nama Pegawai
        <input type="text" name="nama_pegawai">
    </label>
    <br>
    <label>
        Tanggal Lahir
        <input type="date" name="tgl_lahir">
    </label>
    <br>
    <label>
        Foto
        <input type="file" name="foto">
    </label>
    <br>
    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="" cols="30" rows="3"></textarea><br>
    <a href="index.php"><i class="fa-solid fa-arrow-left-long"></i></a>
    <button type="submit" name="submit">Tambahkan</button>
</form>
<style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  color: #333;
}

form {
  max-width: 600px;
  margin: 20px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 10px;
  color: #333;
}

input,
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #00FFAB;
  color: #333;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #9400ff;
  color: #fff;
}

a {
    background-color: #9400ff;
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  text-decoration: none; 
}
</style>
</body>
</html>