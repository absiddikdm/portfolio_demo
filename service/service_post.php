<?php
session_start();
 require '../db.php';

 $title = $_POST['title'];
 $short_desp = $_POST['short_desp'];
 
 $insert = "INSERT INTO services(title, short_desp)VALUES('$title', '$short_desp' )";
 mysqli_query($db_connect, $insert);
 $_SESSION['success'] = 'New Service Added!';
 header('location:service.php');


 ?>
