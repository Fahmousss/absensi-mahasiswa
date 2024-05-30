<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    if (empty($_POST['nip']) || empty($_POST['namaDosen'])) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    $nip = $_POST['nip'];
    $nama_dosen = $_POST['namaDosen'];

    try {
        $sql = mysqli_query($conn, "update dosen set nama='$nama_dosen' where NIP='$nip'");
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
