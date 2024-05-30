<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['nim']) || empty($_POST['namaMhs']) || empty($_POST['kelas'])) {
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
        exit;
    }
    $nim = $_POST['nim'];
    $nama = $_POST['namaMhs'];
    $kelas = $_POST['kelas'];

    $sql = mysqli_query($conn, "update mahasiswa set nama='$nama', id_kelas='$kelas' where nim='$nim'");
    if ($sql) {
        echo "<script>alert('Data berhasil diubah!');document.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }
}

// Close the database connection
$conn->close();
