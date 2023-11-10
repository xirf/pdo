<?php 
$host = "localhost";
$dbname = "pegawai";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $query = "SELECT * FROM karyawan";
    // $steatment = $conn->query($query);

    // while($row = $steatment->fetch(PDO::FETCH_ASSOC)){
    //     echo "ID: " . $row['id_pegawai'] . ", Nama: " . $row['nama_pegawai'] . "<br>";
    // }

    // $conn = null;
} catch(PDOException $e){
    print "Koneksi atau query bermasalah: " . $e->getMessage();
    die();
}

?>