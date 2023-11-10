
<?php  
include 'koneksi.php';

if(isset($_GET['hapus'])){
    if(isset($_GET['hapus'])){
        $id_pegawai = $_GET['hapus'];
        $query = $conn->prepare("DELETE FROM `karyawan` WHERE id_pegawai = :id_pegawai");
        $query->bindParam(":id_pegawai", $id_pegawai);
        $query->execute();
        header("location: index.php");
    } else {
        die("Error: id_pegawai not found");
    }
}
?>



