<?php

include "../include/header.php";
$jadwal = mysqli_query($conn, "select id_jadwal, nama_kelas, dosen.nama as nama_dosen, matakuliah.nama as nama_mk, jam_masuk, jam_keluar, hari from jadwal join kelas on jadwal.id_kelas = kelas.id_kelas join dosen on jadwal.nip = dosen.nip join matakuliah on jadwal.id_mk = matakuliah.id");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Jadwal</h1>
    </div>
    <div class="container-fluid ">
        <form action="tambah_jadwal.php" method="post">
            <div class="row">
                <div class="col mb-3 ">
                    <label for="hari">Hari</label>
                    <select class="form-select" id="hari" name="hari" required>
                        <option selected disabled value="">Hari </option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        ?>
                    </select>
                </div>
                <div class="col mb-3 ">
                    <label for="jamMulai">Jam mulai</label>
                    <input type="time" class="form-control rounded-3" id="jamMulai" name="jamMulai" required />
                </div>
                <div class="col mb-3 ">
                    <label for="jamSelesai">Jam selesai</label>
                    <input type="time" class="form-control rounded-3" id="jamSelesai" name="jamSelesai" required />
                </div>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="kelas" name="kelas">
                    <option selected disabled value="">Choose...</option>
                    <?php
                    $kelas = mysqli_query($conn, "SELECT * FROM kelas");
                    while ($row = mysqli_fetch_array($kelas, MYSQLI_ASSOC)) {
                        echo "<option value='" . $row['id_kelas'] . "'>" . $row['nama_kelas'] . "</option>";
                    }

                    ?>
                </select>
                <label for="kelas">Kelas</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="dosen" name="dosen" onchange="showOptions()">
                    <option selected disabled value="">Choose...</option>
                    <?php
                    $dosen = mysqli_query($conn, "SELECT * FROM dosen");
                    while ($row = mysqli_fetch_array($dosen, MYSQLI_ASSOC)) {
                        echo "<option value='" . $row['NIP'] . "'>" . $row['nama'] . "</option>";
                    }

                    ?>
                </select>
                <label for="dosen">Dosen</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="mk" name="mk">
                    <option selected value="">Choose...</option>
                    ?>
                </select>
                <label for="mk">Matakuliah</label>
            </div>

            <input class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" value="Tambah Data" name="submit">
        </form>
    </div>
    <!-- class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true -->



    <script>
        function showOptions() {
            var selectedDosen = document.getElementById("dosen").value;
            var mkSelect = document.getElementById("mk");
            mkSelect.innerHTML = "";

            // Make an AJAX request to fetch the matakuliah options based on the selected dosen
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_matakuliah.php?dosen=" + selectedDosen, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var matakuliahOptions = JSON.parse(xhr.responseText);

                    // Populate the matakuliah select options
                    for (var i = 0; i <= matakuliahOptions.length; i++) {
                        var option = document.createElement("option");
                        if (matakuliahOptions.length == 0) {
                            option.value = "";
                            option.text = "Tidak ada matakuliah";
                        } else {
                            option.value = matakuliahOptions[i].id;
                            option.text = matakuliahOptions[i].nama;
                        }
                        mkSelect.appendChild(option);
                    }
                }
            };
            xhr.send();
        }
    </script>

    <?php

    include "../include/footer.php";

    ?>