<?php
include '../../connection.php';

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    // $sql = mysqli_query($conn, "DELETE FROM `kelas` WHERE `id_kelas`='$id_kelas'");
    
    try {
        $sql = mysqli_query($conn, "DELETE FROM `dosen` WHERE `NIP`='$nip'");
        if ($sql) {
            echo "<script>alert('Data berhasil dihapus!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
    
}
