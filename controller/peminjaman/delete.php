<?php

include "../../model/connection.php";
session_start();

$id = $_GET['id'];

$sql = "DELETE FROM peminjaman WHERE id = '$id'";
$query = mysqli_query($connection, $sql);

if ($query) {
  $_SESSION['status'] = 'success';
  $_SESSION['message'] = 'Data  berhasil dihapus';
  header('Location: ../../view/peminjaman/index.php');

} else {
  $_SESSION['status'] = 'failed';
  $_SESSION['message'] = 'Data  gagal dihapus';
  header('Location: ../../view/peminjaman/index.php');
}


?>