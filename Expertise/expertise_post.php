<?php
session_start();
 require '../db.php';

 $topic_name = $_POST['topic_name'];
 $percentage = $_POST['percentage'];
 
 $insert = "INSERT INTO expertise(topic_name, percentage)VALUES('$topic_name', '$percentage' )";
 mysqli_query($db_connect, $insert);
 $_SESSION['success'] = 'New Skill Added!';
 header('location:expertise.php');


 ?>
