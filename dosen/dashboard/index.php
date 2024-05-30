<?php
session_start();
include("../../connection.php");

if (!isset($_SESSION['admin_username'])) {
  header("Location: ../../login.php");
}


if (in_array("admin", $_SESSION['admin_access']) || in_array("mahasiswa", $_SESSION['admin_access'])) {
  header("Location: ../../include/404.php");
  exit();
}
?>
halo