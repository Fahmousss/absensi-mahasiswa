<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    $kode = $_POST['kode'];
    $nama_mk = $_POST['namaMk'];
    $dosen = $_POST['dosen'];
    // Validate if data is empty
    if (empty($kode) || empty($nama_mk)) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    try{
        $sql = mysqli_query($conn, "insert into matakuliah values('$kode', '$nama_mk', '$dosen')");
        if ($sql) {
            echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal ditambahkan!');document.location.href='index.php'</script>";
    }
}

// Close the database connection
$conn->close();
