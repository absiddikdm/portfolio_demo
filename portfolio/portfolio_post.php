<?php
session_start();
 require '../db.php';

 $title = $_POST['title'];
 $category = $_POST['category'];
 $image = $_FILES['image'];

 $after_explode = explode('.', $image['name']);
 $extension = end($after_explode);
 $file_name = 'portfolio'.'-'.rand(10000,20000).'.'.$extension;

 $new_location = '../uploads/portfolio/'.$file_name;
 move_uploaded_file($image['tmp_name'], $new_location);

 
 $insert = "INSERT INTO portfolios(title,category,image)VALUES('$title', '$category', '$file_name' )";
 mysqli_query($db_connect, $insert);
 $_SESSION['success'] = 'New Portfolio Added!';
 header('location:portfolio.php');


 ?>
