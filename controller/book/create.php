<?php 

include "../../model/connection.php";
session_start();

if(isset($_POST['submit'])) {
  
  $title = ucwords($_POST['title']);
  $author = ucwords($_POST['author']);
  $id_publisher = $_POST['id_publisher'];

  // Image Validation
  if (is_uploaded_file($_FILES['image']["tmp_name"])) {
    $fileName = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $dirUpload = "../../public/image/book/";
   
    $upload = move_uploaded_file($tmp_name, $dirUpload.$fileName);

    if(!$upload) {
      return redirectBackWithError('Gambar Gagal diupload');
    }

  } else {
      return redirectBackWithError('Gambar wajib diisi');
  }

  $sql = "INSERT INTO book (title, author, id_publisher, image) VALUE ('$title', '$author', '$id_publisher', '$fileName');";

  $query = mysqli_query($connection, $sql);
  
  if ($query) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Data "'.$title.'" berhasil ditambahkan';
    header('Location: ../../view/book/index.php');

  } else {
    return redirectBackWithError('Tidak diketahui');
  }

}

function redirectBackWithError($message) {
  $_SESSION['status'] = 'failed';
  $_SESSION['message'] = 'Data gagal ditambahkan : '.$message;
  header('Location: ../../view/book/index.php');
}

?>
