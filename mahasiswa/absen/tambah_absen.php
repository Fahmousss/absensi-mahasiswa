<?php
include "../../connection.php";
session_start();
if (isset($_POST['submit'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $nim = $_POST['nim'];

    if (isset($_SESSION['submitted'])) {
        die();
    } else {
        $sql = "INSERT INTO absensi (id_jadwal, tgl_masuk, waktu_hadir, absensi.status, nim) VALUES ('$id_jadwal', CURDATE(),TIME(NOW()), 1, '$nim'	)";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan!');document.location.href='index.php'</script>";
        }
        $_SESSION['submitted'] = true;
    }
}

// Close the database connection
$conn->close();
