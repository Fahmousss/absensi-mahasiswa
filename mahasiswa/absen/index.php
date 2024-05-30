<?php
include "../include/navbar.php";




?>



<body class="bg-body-tertiary">
    
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Sistem Informasi Absensi Mahasiswa</h2>
                <p class="lead">Halo <span class="text-primary"><?= $_SESSION['admin_username'] ?></span>, Silahkan isi form berikut untuk melakukan absensi</p>
            </div>
            <?php
            while ($row = mysqli_fetch_array($jadwal, MYSQLI_ASSOC)) {
                switch ($row['hari']) {
                    case 'Senin':
                        $row['hari'] = "Sun";
                        break;
                    case 'Selasa':
                        $row['hari'] = "Tue";
                        break;
                    case 'Rabu':
                        $row['hari'] = "Sun";
                        break;
                    case 'Kamis':
                        $row['hari'] = "Thu";
                        break;
                    case 'Jumat':
                        $row['hari'] = "Fri";
                        break;
                    case 'Sabtu':
                        $row['hari'] = "Sat";
                        break;
                    case 'Minggu':
                        $row['hari'] = "Sun";
                        break;
                    default:

                        break;
                }
                if (date('D', time()) == $row['hari'] && time() >= strtotime($row['jam_masuk']) && time() <= strtotime($row['jam_keluar'])) {
                    switch ($row['hari']) {
                        case 'Mon':
                            $row['hari'] = "Senin";
                            break;
                        case 'Tue':
                            $row['hari'] = "Selasa";
                            break;
                        case 'Wed':
                            $row['hari'] = "Rabu";
                            break;
                        case 'Thu':
                            $row['hari'] = "Kamis";
                            break;
                        case 'Fri':
                            $row['hari'] = "Jumat";
                            break;
                        case 'Sat':
                            $row['hari'] = "Sabtu";
                            break;
                        case 'Sun':
                            $row['hari'] = "Minggu";
                            break;
                        default:

                            break;
                    }
            ?>
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <h4 class="mb-3">Absensi Matakuliah <?= $row['nama_mk'] ?></h4>
                            <div class="row bg-body-secondary py-2 px-2 my-3 rounded-3">
                                <div class="col">
                                    <ul class="list-unstyled mt-3">
                                        <li><span class="fw-bold">Hari:</span> <?= $row['hari'] ?></li>
                                        <li><span class="fw-bold">Tanggal:</span> <?= date('d-M-Y', time()) ?></li>
                                        <li><span class="fw-bold">Jam:</span> <?= date('H:i', strtotime($row['jam_masuk'])) . " - " . date('H:i', strtotime($row['jam_keluar'])) ?></li>
                                    </ul>
                                </div>

                                <div class="col">
                                    <ul class="list-unstyled mt-3">
                                        <li><span class="fw-bold">Kelas:</span> <?= $row['nama_kelas'] ?></li>
                                        <li><span class="fw-bold">Dosen:</span> <?= $row['nama_dosen'] ?></li>
                                        <li><span class="fw-bold">Matakuliah:</span> <?= $row['nama_mk'] ?></li>
                                    </ul>
                                </div>
                                <form class="row row-cols-lg-auto g-3 align-items-center" method="post" action="tambah_absen.php">
                                    <div class="row">
                                        <label for="waktu" class="fw-semibold col-sm-4 col-form-label">Waktu hadir:</label>
                                        
                                            <div class="col-sm-5">
                                                <input type="time" class="form-control" id="waktu" name="waktu"  readonly>
                                            </div>
                                        
                                        <!-- else -->
                                        <div class="col-sm-3">
                                            <input type="hidden" name="id_jadwal" value="<?= $row['id_jadwal'] ?>">
                                            <input type="hidden" name="nim" value="<?= $_SESSION['nim'] ?>">
                                            <input class="btn rounded-3 btn-success" type="submit" value="Submit kehadiran" name="submit">
                                        </div>
                                    </div>



                                </form>
                            </div>

                            <table class="table caption-top table-bordered mt-2">
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu Hadir</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index1 = 1;
                                    $absensi = mysqli_query($conn, "SELECT * FROM absensi WHERE nim = '$_SESSION[nim]'");
                                    if ($baris1 = mysqli_num_rows($absensi) > 0) {

                                        while ($row1 = mysqli_fetch_assoc($absensi)) {
                                            if ($row1['id_jadwal'] == $row['id_jadwal']) {
                                    ?>
                                                <tr>
                                                    <th scope="row"><?= $index1 ?></th>
                                                    <td><?= date('D, d-M-Y', strtotime($row1['tgl_masuk'])) ?></td>
                                                    <td><?= $row1['waktu_hadir'] ?></td>
                                                    <td>
                                                        <?php if ($row1['status'] == 1) {
                                                        ?> <span class="badge bg-success">Hadir</span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-danger">Tidak Hadir</span>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row1['keterangan'] == null) {
                                                        ?> <span class="badge bg-secondary">-</span>
                                                        <?php } else {
                                                            echo $row1['keterangan'];
                                                        } ?>
                                                    </td>
                                                    <td class="d-flex gap-2">
                                                        <button type=" button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDetail<?php echo $row['id_jadwal'] ?>">Detail</button>
                                                    </td>
                                                </tr>

                                        <?php $index1++;
                                            }
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">
                                                <table class="table mb-0">
                                                    <div class="alert alert-secondary flex-fill" role="alert">
                                                        Absensi Kosong
                                                    </div>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <!-- <?php
                    // if (date('H:i') >= strtotime($jadwalArr['jam_masuk']) && date('H:i') <= strtotime($jadwalArr['jam_keluar'])){
                    // }
                    ?> -->
        </main>
    </div>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/dist/js/jammasuk.js"></script>

</body>

</html>