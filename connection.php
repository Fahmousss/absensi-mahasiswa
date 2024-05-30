<?php
date_default_timezone_set('Asia/Jakarta');

$conn = mysqli_connect("localhost", "root", "", "sistem_absensi");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}