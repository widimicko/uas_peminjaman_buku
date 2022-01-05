<?php

  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kuliah_web_uas";

  $connection = mysqli_connect($server, $user, $password, $database);

  if(!$connection) {
    die("Failed connect to database: " . mysqli_connect_error());
  }

?>
