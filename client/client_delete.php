<?php
session_start();
 require '../db.php';

 $id = $_GET['id'];
 $delete = "DELETE FROM messages WHERE id=$id";
 mysqli_query($db_connect, $delete);
 $_SESSION['delete']= 'Client Deleted Successfully';
 header('location:client.php');
 
 ?>