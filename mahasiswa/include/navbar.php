<?php
session_start();
include("../../connection.php");

if (!isset($_SESSION['admin_username'])) {
    header("Location: ../../login.php");
}


if (in_array("admin", $_SESSION['admin_access']) || in_array("admin", $_SESSION['admin_access'])) {
    header("Location: ../../include/404.php");
    exit();
}

$jadwal = mysqli_query($conn, "SELECT id_jadwal, jam_masuk, jam_keluar, nama_kelas, dosen.nama as nama_dosen, matakuliah.nama as nama_mk, hari  FROM jadwal INNER JOIN dosen on jadwal.nip = dosen.nip INNER JOIN matakuliah on jadwal.id_mk = matakuliah.id INNER JOIN kelas on jadwal.id_kelas = kelas.id_kelas where jadwal.id_kelas = (SELECT id_kelas FROM mahasiswa WHERE user_id = (SELECT id FROM user WHERE username = '$_SESSION[admin_username]'))");
?>
<!doctype html>
<html lang="en" data-bs-theme="light">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">


<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
</style>



</head>
<nav class="navbar navbar-expand-lg bg-body-secondary" aria-label="Fifth navbar example">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../../assets/brand/Logo Universitas Sriwijaya.png" width="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <ul class="navbar-nav">
                <li class="text-secondary" style="margin-right: 2rem;">Logged in as <?= $_SESSION['admin_username'] ?></li>
                <li><a href="../../logout.php" class="text-decoration-none">Logout</a></li>
            </ul>

        </div>
    </div>
</nav>