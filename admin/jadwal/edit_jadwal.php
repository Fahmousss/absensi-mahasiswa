<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jamMulai'];
    $jam_selesai = $_POST['jamSelesai'];
    $kelas = $_POST['kelas'];
    $dosen = $_POST['dosen'];
    $matakuliah = $_POST['mk'];
    }
    // Check if the form data is empty
   
    try {
        $sql = mysqli_query($conn, "update jadwal set id_kelas='$kelas', nip='$dosen', id_mk='$matakuliah', jam_masuk='$jam_mulai', jam_keluar='$jam_selesai', hari='$hari' where id_jadwal='$id'");
        if ($sql) {
            echo "<script>alert('Data berhasil diubah!');document.location.href='index.php'</script>";
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        echo "<script>alert('Data gagal diubah!');document.location.href='index.php'</script>";
    }


// Close the database connection
$conn->close();
