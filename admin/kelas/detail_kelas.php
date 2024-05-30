<?php

include "../include/header.php";
$id_kelas = "";
if (isset($_REQUEST['id_kelas'])) {
    $id_kelas = $_REQUEST['id_kelas'];
} 
$mahasiswa = mysqli_query($conn, "SELECT nim, nama, nama_kelas FROM mahasiswa, kelas where mahasiswa.id_kelas = $id_kelas and mahasiswa.id_kelas = kelas.id_kelas");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <?php
            $kelas = mysqli_query($conn, "SELECT nama_kelas FROM kelas WHERE id_kelas = $id_kelas");
            $row = mysqli_fetch_assoc($kelas);
            echo $row['nama_kelas'];
            ?>
        </h1>
    </div>
    
    <div class="d-flex flex-wrap ">
        <table class="table caption-top table-bordered mt-2">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
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
                        </tr>
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


    
    <?php

    include "../include/footer.php";

    ?>