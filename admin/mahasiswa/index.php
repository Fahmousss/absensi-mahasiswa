<?php

include "../include/header.php";
$mahasiswa = mysqli_query($conn, "SELECT nim, nama, nama_kelas FROM mahasiswa, kelas where mahasiswa.id_kelas = kelas.id_kelas");
// print_r($mahasiswa);

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Mahasiswa</h1>
    </div>
    <div class="d-flex justify-content-end">
        <div class="">
            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
        </div>
    </div>
    <div class="d-flex flex-wrap ">
        <table class="table caption-top table-bordered mt-2">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($baris = mysqli_num_rows($mahasiswa) > 0){
                    while ($row = mysqli_fetch_assoc($mahasiswa)) {
                ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['nama_kelas'] ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['nim'] ?>">Edit</button>
                                <button type=" button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $row['nim'] ?>">Hapus</button>
                            </td>
                        </tr>
                        <div class="modal fade modal-sheet" tabindex="-1" role="dialog" id="modalDelete<?= $row['nim'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content rounded-3 shadow">
                                    <div class="modal-body p-4 text-center">
                                        <h5 class="mb-3 ">Yakin ingin menghapus data ini?</h5>
                                        <p class="mb-0">
                                            Data yang pilih akan dihapus secara <span class="text-danger">permanen </span> dan tidak bisa dikembalikan.
                                        </p>
                                    </div>
                                    <div class="modal-footer flex-nowrap p-0">
                                        <form action="hapus_mahasiswa.php" method="post">
                                            <input type="hidden" name="nim" value="<?= $row['nim'] ?>" />
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
                        <div class="modal fade modal-sheet" tabindex="-1" role="dialog" id="modalEdit<?= $row['nim'] ?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header p-5 pb-4 border-bottom-0">
                                        <h1 class="fw-bold mb-0 fs-2 text-center">Edit Data Mahasiswa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body p-5 pt-0">
                                        <form action="edit_mahasiswa.php" method="post">
                                            <div class="form-floating mb-3 ">
                                                <input type="text" class="form-control rounded-3" id="floatingNim" placeholder="Ex: 09031111111111" name="nim" value="<?= $row['nim'] ?>" required readonly />
                                                <label for="floatingNim" class="col-form-label col-form-label-sm">NIM</label>
                                            </div>
                                            <div class="form-floating mb-3 ">
                                                <input type="text" class="form-control rounded-3" id="floatingNama" placeholder="Ex: Budi Sanjaya" name="namaMhs" value="<?= $row['nama'] ?>" required/>
                                                <label for="floatingNama">Nama Mahasiswa</label>
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
                                    Data Mahasiswa Kosong
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
                    <h1 class="fw-bold mb-0 fs-2 text-center">Tambah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form action="tambah_mahasiswa.php" method="post">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control rounded-3" id="floatingNim" placeholder="Ex: 09031111111111" name="nim" required />
                            <label for="floatingNim" class="col-form-label col-form-label-sm">NIM</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control rounded-3" id="floatingNama" placeholder="Ex: Budi Sanjaya" name="namaMhs" required />
                            <label for="floatingNama">Nama Mahasiswa</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="kelas" name="kelas" required>
                                <option selected disabled value="">Choose...</option>
                                <?php
                                $kelas = mysqli_query($conn, "SELECT * FROM kelas");
                                while ($row = mysqli_fetch_assoc($kelas)) {
                                    echo "<option value='" . $row['id_kelas'] . "'>" . $row['nama_kelas'] . "</option>";
                                }
                                ?>
                            </select>
                            <label for="kelas">Kelas</label>
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