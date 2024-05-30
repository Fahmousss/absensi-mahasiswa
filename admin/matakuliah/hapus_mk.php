<?php
include '../../connection.php';

if (isset($_POST['submit'])) {
    $kode = $_POST['id'];

    try {
        $sql = mysqli_query($conn, "DELETE FROM `matakuliah` WHERE `id`='$kode'");
        if ($sql) {
            echo "<script>alert('Data berhasil dihapus!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
}
