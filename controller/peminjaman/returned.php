<?php 

include "../../model/connection.php";
session_start();

if(isset($_GET['id'])) {

  // Tarif denda terlambat per hari
  $fine_rate = 5000;
  
  $id = $_GET['id'];

  $sql = "SELECT * FROM peminjaman WHERE id = '$id'";
  $query = mysqli_query($connection, $sql);
  
  while ($row = mysqli_fetch_array($query)) {
    $return_date = date_create($row['return_date']);
  }

  $current_date = date('Y-m-d');

  $diff = date_diff($return_date, date_create($current_date));

  $difference = intval($diff->format("%r%a"));

  if ($difference <= 0) {
    $charge = 0;
  } else if ($difference > 0) {
    $charge = $fine_rate * $difference;
  }

  $sql = "UPDATE peminjaman SET returned_date = '$current_date', charge = '$charge'  WHERE id = '$id';";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Buku berhasil dikembalikan';
    header('Location: ../../view/peminjaman/index.php');

  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Buku gagal dikembalikan';
    header('Location: ../../view/peminjaman/index.php');
  }

}

?>
