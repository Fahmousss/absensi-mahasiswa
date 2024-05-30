<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    
    $nama = $_POST['namaKls'];
    // Validate if data is empty
    if (empty($nama)) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    
    $sql = mysqli_query($conn, "insert into kelas(nama_kelas) values('$nama')");
    if ($sql) {
        echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!');document.location.href='index.php'</script>";
    }
}

// Close the database connection
$conn->close();
