<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    $kode = $_POST['id'];
    $nama = $_POST['namaMk'];
    $dosen = $_POST['dosen'];

    $sql = mysqli_query($conn, "update matakuliah set nama='$nama', nip = '$dosen' where id='$kode'");
    if ($sql) {
        echo "<script>alert('Data berhasil diubah!');document.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
}

// Close the database connection
$conn->close();
