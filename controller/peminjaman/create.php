<?php 

include "../../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $id_member = $_POST['id_member'];
  $id_book = $_POST['id_book'];
  $borrow_date = $_POST['borrow_date'];
  $return_date = $_POST['return_date'];

  $sql = "INSERT INTO peminjaman (id_member, id_book, borrow_date, return_date) VALUE ('$id_member', '$id_book', '$borrow_date', '$return_date');";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';
    header('Location: ../../view/peminjaman/index.php');

  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Data gagal ditambahkan';
    header('Location: ../../view/peminjaman/add.php');
  }

}

?>
