<?php

include "../include/header.php";
$jadwal = mysqli_query($conn, "select id_jadwal, nama_kelas, dosen.nama as nama_dosen, matakuliah.nama as nama_mk, jam_masuk, jam_keluar, hari from jadwal join kelas on jadwal.id_kelas = kelas.id_kelas join dosen on jadwal.nip = dosen.nip join matakuliah on jadwal.id_mk = matakuliah.id");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Jadwal</h1>
    </div>
    <div class="d-flex justify-content-end">
        <div class="">
            <a type="button" class="btn btn-sm btn-outline-success" href="form_tambah_jadwal.php">Tambah Jadwal</a>
        </div>
    </div>
    <div class="d-flex flex-wrap ">
        <table class="table caption-top table-bordered mt-2">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Matakuliah</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($baris = mysqli_num_rows($jadwal) > 0) {
                    while ($row = mysqli_fetch_assoc($jadwal)) {
                ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td><?= $row['hari'] ?></td>
                            <td><?= date('H:i', strtotime($row['jam_masuk'])) . " - " . date('H:i', strtotime($row['jam_keluar'])) ?></td>
                            <td><?= $row['nama_kelas'] ?></td>
                            <td><?= $row['nama_mk'] ?></td>
                            <td><?= $row['nama_dosen'] ?></td>
                            <td class="d-flex gap-2">
                                <form action="form_edit_jadwal.php" method="post">
                                    <input type="hidden" name="id" value="<?= $row['id_jadwal'] ?>" />
                                    <input type="submit" class="btn btn-sm btn-outline-primary" name="edit" value="Edit" />
                                </form>
                                <button type=" button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $row['id_jadwal'] ?>">Hapus</button>
                            </td>
                        </tr>
                        <div class="modal fade modal-sheet" tabindex="-1" role="dialog" id="modalDelete<?= $row['id_jadwal'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content rounded-3 shadow">
                                    <div class="modal-body p-4 text-center">
                                        <h5 class="mb-3 ">Yakin ingin menghapus data ini?</h5>
                                        <p class="mb-0">
                                            Data yang pilih akan dihapus secara <span class="text-danger">permanen </span> dan tidak bisa dikembalikan.
                                        </p>
                                    </div>
                                    <div class="modal-footer flex-nowrap p-0">
                                        <form action="hapus_jadwal.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['id_jadwal'] ?>" />
                                            <input type="submit" value="Hapus" class="btn btn-lg fs-6 fw-bold text-danger col-6 py-3 m-0 rounded-0 border-end" name="submit" />
                                            <!-- <strong class="text-danger">Hapus</strong> -->
                                        </form>
                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">
                                            Batalkan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php $index++;
                    }
                } else { ?>
                    <tr>
                        <td colspan="7">
                            <table class="table mb-0">
                                <div class="alert alert-secondary flex-fill" role="alert">
                                    Data Jadwal Kosong
                                </div>
                            </table>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true -->


    
    <script>
        function showOptions() {
            var dosen = document.getElementById('dosen').value;
            document.cookie = "dosen=" + dosen;
        }
    </script>

    <?php

    include "../include/footer.php";

    ?>