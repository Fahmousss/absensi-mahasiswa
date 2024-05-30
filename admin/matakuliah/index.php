<?php

include "../include/header.php";
$matakuliah = mysqli_query($conn, "select * from matakuliah");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Matakuliah</h1>
    </div>
    <div class="d-flex justify-content-end">
        <div class="">
            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Matakuliah</button>
        </div>
    </div>
    <div class="d-flex flex-wrap ">
        <table class="table caption-top table-bordered mt-2">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Dosen Pengampu</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($baris = mysqli_num_rows($matakuliah) > 0) {
                    while ($row = mysqli_fetch_assoc($matakuliah)) {
                ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td>
                                <ul>
                                    <?php
                                    $dosen = mysqli_query($conn, "select nama from dosen where NIP = " . $row['nip']);
                                    if (!empty($baris = mysqli_num_rows($dosen))) {
                                        while ($rowDosen = mysqli_fetch_assoc($dosen)) {
                                    ?>
                                            <li><?= $rowDosen['nama'] ?></li>

                                    <?php
                                        }
                                    }
                                    ?>


                                </ul>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>">Edit</button>
                                <button type=" button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $row['id'] ?>">Hapus</button>
                            </td>
                        </tr>
                        <div class="modal fade modal-sheet" tabindex="-1" role="dialog" id="modalDelete<?= $row['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content rounded-3 shadow">
                                    <div class="modal-body p-4 text-center">
                                        <h5 class="mb-3 ">Yakin ingin menghapus data ini?</h5>
                                        <p class="mb-0">
                                            Data yang pilih akan dihapus secara <span class="text-danger">permanen </span> dan tidak bisa dikembalikan.
                                        </p>
                                    </div>
                                    <div class="modal-footer flex-nowrap p-0">
                                        <form action="hapus_mk.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>" />
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
                        <div class="modal fade modal-sheet" tabindex="-1" role="dialog" id="modalEdit<?= $row['id'] ?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header p-5 pb-4 border-bottom-0">
                                        <h1 class="fw-bold mb-0 fs-2 text-center">Edit Data Matakuliah</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body p-5 pt-0">
                                        <form action="edit_mk.php" method="post">

                                            <div class="form-floating mb-3 ">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                                <input type="text" class="form-control rounded-3" id="floatingNama" placeholder="Ex: SIBIL X" name="namaMk" value="<?= $row['nama'] ?>" required />
                                                <label for="floatingNama">Nama Matakuliah</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="dosen" name="dosen">
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php
                                                    $dosen = mysqli_query($conn, "SELECT * FROM dosen");
                                                    while ($row = mysqli_fetch_array($dosen, MYSQLI_ASSOC)) {
                                                        echo "<option value='" . $row['NIP'] . "'>" . $row['nama'] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                                <label for="dosen">Dosen Pengampu</label>
                                            </div>

                                            <input class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" value="Edit Data" name="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $index++;
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <table class="table mb-0">
                                <div class="alert alert-secondary flex-fill" role="alert">
                                    Data Kelas Kosong
                                </div>
                            </table>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true -->


    <div class="modal fade modal-sheet" tabindex="-1" role="dialog" id="modalTambah">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2 text-center">Tambah Data Matakuliah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form action="tambah_mk.php" method="post">

                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control rounded-3" id="floatingKode" placeholder="Ex: SIBIL X" name="kode" required />
                            <label for="floatingKode">Kode Matakuliah</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control rounded-3" id="floatingNama" placeholder="Ex: SIBIL X" name="namaMk" required />
                            <label for="floatingNama">Nama Matakuliah</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="dosen" name="dosen">
                                <option selected disabled value="">Choose...</option>
                                <?php
                                $dosen = mysqli_query($conn, "SELECT * FROM dosen");
                                while ($row = mysqli_fetch_array($dosen, MYSQLI_ASSOC)) {
                                    echo "<option value='" . $row['NIP'] . "'>" . $row['nama'] . "</option>";
                                }

                                ?>
                            </select>
                            <label for="dosen">Dosen Pengampu</label>
                        </div>

                        <input class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" value="Tambah Data" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php

    include "../include/footer.php";

    ?>