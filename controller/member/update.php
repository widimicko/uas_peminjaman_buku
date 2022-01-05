<?php 

include "../../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $id = ucwords($_POST['id']);
  $name = ucwords($_POST['name']);
  $id_number = $_POST['id_number'];
  $domicile = ucwords($_POST['domicile']);
  $datebirth = $_POST['datebirth'];

  $sql = "UPDATE member SET name = '$name', id_number = '$id_number',  domicile = '$domicile', datebirth = '$datebirth' WHERE id = '$id';";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Data "'.$name.'" berhasil diubah';
    header('Location: ../../view/member/index.php');

  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Data "'.$name.'" gagal diubah';
    header('Location: ../../view/member/index.php');
  }

}

?>
