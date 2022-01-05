<?php 

include "../../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $name = ucwords($_POST['name']);

  $sql = "INSERT INTO publisher (name) VALUE ('$name');";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Data "'.$name.'" berhasil ditambahkan';
    header('Location: ../../view/publisher/index.php');

  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Data "'.$name.'" gagal ditambahkan';
    header('Location: ../../view/publisher/index.php');
  }

}

?>
