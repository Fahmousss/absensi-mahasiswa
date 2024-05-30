<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    if (empty($_POST['id']) || empty($_POST['namaKls'])) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    $id_kelas = $_POST['id'];
    $nama_kelas = $_POST['namaKls'];

   
    try {
        $sql = mysqli_query($conn, "update kelas set nama_kelas='$nama_kelas' where id_kelas='$id_kelas'");
        if ($sql) {
            echo "<script>alert('Data berhasil diubah!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
}

// Close the database connection
$conn->close();
