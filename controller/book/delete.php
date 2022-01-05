<?php

include "../../model/connection.php";
session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM peminjaman WHERE id_book = '$id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($query)) {
  $returned_date = $row['returned_date'];
}

if($returned_date == NULL) {
  return redirectBackWithError('Buku masih dipinjam tidak dapat dihapus');
}

while ($row = mysqli_fetch_array($query)) {
  $return_date = date_create($row['return_date']);
}

$sql = "SELECT * FROM book WHERE id = '$id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($query)) {
  $fileName = $row['image'];
  if (file_exists('../../public/image/book/'. $fileName)) {
    unlink('../../public/image/book/'. $fileName);
  } else {
    return redirectBackWithError('File gambar tidak ada dalam server untuk dihapus');
  }
}

$sql = "DELETE FROM book WHERE id = '$id'";
$query = mysqli_query($connection, $sql);

if ($query) {
  $_SESSION['status'] = 'success';
  $_SESSION['message'] = 'Data  berhasil dihapus';
  header('Location: ../../view/book/index.php');

} else {
  return redirectBackWithError('Tidak diketahui');
}

function redirectBackWithError($message) {
  $_SESSION['status'] = 'failed';
  $_SESSION['message'] = 'Data gagal dihapus : '.$message;
  header('Location: ../../view/book/index.php');
}


?>