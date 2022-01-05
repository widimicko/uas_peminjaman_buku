<?php 

include "../../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $name = ucwords($_POST['name']);
  $id_number = $_POST['id_number'];
  $domicile = ucwords($_POST['domicile']);
  $datebirth = $_POST['datebirth'];

  $sql = "INSERT INTO member (name, id_number, domicile, datebirth) VALUE ('$name', '$id_number', '$domicile', '$datebirth');";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Data "'.$name.'" berhasil ditambahkan';
    header('Location: ../../view/member/index.php');

  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Data "'.$name.'" gagal ditambahkan';
    header('Location: ../../view/member/index.php');
  }

}

?>
