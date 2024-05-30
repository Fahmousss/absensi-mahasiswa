<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    $nim = $_POST['nim'];
    $nama = $_POST['namaMhs'];
    $kelas = $_POST['kelas'];
    // Validate if data is empty
    if (empty($nim) || empty($nama) || empty($kelas)) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    try{
        $sql = mysqli_query($conn, "insert into mahasiswa values('$nim', '$nama', '$kelas', null)");
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
