<?php

$title = "Dashboard";
include("../include/header.php");
$mahasiswa = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM mahasiswa"));
$dosen = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM dosen"));
$matakuliah = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM matakuliah"));
$kelas = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM kelas"));

// $mahasiswa = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM mahasiswa");


?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>
  <div class="d-flex flex-wrap ">
    <div class="card text-bg-success m-2" style="max-width: 300px">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Total Mahasiswa</h5>
            <p class="card-text"><?= $mahasiswa['jumlah'] ?> Mahasiswa</p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="../../assets/img/ajri.jpg" class="img-fluid rounded-end" alt="...">
        </div>
      </div>
    </div>
    <div class="card text-bg-warning m-2" style="max-width: 300px">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Total Dosen</h5>
            <p class="card-text"><?= $dosen['jumlah'] ?> Dosen</p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="../../assets/img/ajri.jpg" class="img-fluid rounded-end" alt="...">
        </div>
      </div>
    </div>
    <div class="card text-bg-info m-2" style="max-width: 300px">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Total Matakuliah</h5>
            <p class="card-text"><?= $matakuliah['jumlah'] ?> Matakuliah</p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="../../assets/img/ajri.jpg" class="img-fluid rounded-end" alt="...">
        </div>
      </div>
    </div>
    <div class="card text-bg-primary m-2" style="max-width: 300px">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Total Kelas</h5>
            <p class="card-text"><?= $kelas['jumlah'] ?> Kelas</p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="../../assets/img/ajri.jpg" class="img-fluid rounded-end" alt="...">
        </div>
      </div>
    </div>
  </div>

</main>
</div>
</div>
<?php
include("../include/footer.php");
?>