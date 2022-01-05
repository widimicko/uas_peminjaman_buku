<?php

include "../../model/connection.php";
session_start();

$id = $_POST['id'];
$title = ucwords($_POST['title']);
$author = ucwords($_POST['author']);
$id_publisher = $_POST['id_publisher'];


$sql = "SELECT * FROM book WHERE id = '$id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($query)) {
  $existFileName = $row['image'];
}

if (is_uploaded_file($_FILES['image']["tmp_name"])) {

  if (file_exists('../../public/image/book/'. $existFileName)) {
    unlink('../../public/image/book/'. $existFileName);
  } else {
      return redirectBackWithError('File gambar tidak ada dalam server untuk dihapus');
  }
  
  $fileName = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];
  $dirUpload = "../../public/image/book/";
 
  $upload = move_uploaded_file($tmp_name, $dirUpload.$fileName);

  $saveImage = $fileName;

  if(!$upload) {
    return redirectBackWithError('Gambar gagal diupload');
  }
} else {
  $saveImage = $existFileName;
}

$sql = "UPDATE book SET title = '$title', author = '$author', id_publisher = '$id_publisher', image = '$saveImage' WHERE id = '$id';";


$query = mysqli_query($connection, $sql);

if ($query) {
  $_SESSION['status'] = 'success';
  $_SESSION['message'] = 'Data berhasil diubah';
  header('Location: ../../view/book/index.php');

} else {
  return redirectBackWithError('Tidak diketahui');
}

function redirectBackWithError($message) {
  $_SESSION['status'] = 'failed';
  $_SESSION['message'] = 'Data gagal diubah : '.$message;
  header('Location: ../../view/book/index.php');
}


?>