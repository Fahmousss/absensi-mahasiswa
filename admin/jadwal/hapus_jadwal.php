<?php
include '../../connection.php';

if (isset($_POST['submit'])) {
    $id_jadwal = $_POST['id'];
    // $sql = mysqli_query($conn, "DELETE FROM `kelas` WHERE `id_kelas`='$id_kelas'");
    
    try {
        $sql = mysqli_query($conn, "DELETE FROM `jadwal` WHERE `id_jadwal`='$id_jadwal'");
        if ($sql) {
            echo "<script>alert('Data berhasil dihapus!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
   
}
