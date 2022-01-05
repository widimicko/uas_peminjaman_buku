<?php 

include "../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
  $query = mysqli_query($connection, $sql);

  $check = mysqli_num_rows($query);

  if ($check > 0) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Selamat datang, ' .$email. '';
    header('Location: ../view/peminjaman/index.php');
  } else {
    $_SESSION['status'] = 'failed';
    $_SESSION['message'] = 'Gagal login, cek kembali kredensial anda';
    header('Location: ../view/login.php');
  }

}

?>
