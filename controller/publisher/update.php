<?php 

include "../../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $id = ucwords($_POST['id']);
  $name = ucwords($_POST['name']);

  $sql = "UPDATE publisher SET name = '$name' WHERE id = '$id';";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Data "'.$name.'" berhasil diubah';
    header('Location: ../../view/publisher/index.php');

  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Data "'.$name.'" gagal diubah';
    header('Location: ../../view/publisher/index.php');
  }

}

?>
