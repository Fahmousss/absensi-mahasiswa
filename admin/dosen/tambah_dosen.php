<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    $nip = $_POST['nip'];
    $nama_dosen = $_POST['namaDosen'];
    // Validate if data is empty
    if (empty($nip) || empty($nama_dosen)) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    
    try {
        $sql = mysqli_query($conn, "insert into dosen values('$nip','$nama_dosen', null)");
        if ($sql) {
            echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
}

// Close the database connection
$conn->close();
