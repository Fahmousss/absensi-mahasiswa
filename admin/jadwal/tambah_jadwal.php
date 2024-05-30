<?php
include "../../connection.php";
if (isset($_POST['submit'])) {
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jamMulai'];
    $jam_selesai = $_POST['jamSelesai'];
    $kelas = $_POST['kelas'];
    $dosen = $_POST['dosen'];
    $matakuliah = $_POST['mk'];
    
    if (empty($hari) || empty($jam_mulai) || empty($jam_selesai) || empty($kelas) || empty($dosen) || empty($matakuliah)) {
        # code...
        echo "<script>alert('Data tidak boleh kosong!');document.location.href='index.php'</script>";
    }

    
        $sql = "INSERT INTO jadwal (id_kelas, nip, id_mk, jam_masuk, jam_keluar, hari) VALUES ('$kelas', '$dosen', '$matakuliah','$jam_mulai','$jam_selesai' ,'$hari')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil ditambahkan!');document.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan!');document.location.href='index.php'</script>";
        }
}

// Close the database connection
$conn->close();
