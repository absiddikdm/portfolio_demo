<?php 
session_start();
require '../db.php';
$id = $_GET['id'];

$photo = " SELECT * FROM portfolios WHERE id=$id";
$photo_res = mysqli_query($db_connect, $photo);
$after_assoc = mysqli_fetch_assoc($photo_res);

$delete_from = '../uploads/portfolio/'.$after_assoc['image'];
unlink($delete_from);


$delete = "DELETE FROM portfolios WHERE id=$id";
mysqli_query($db_connect, $delete);
$_SESSION['delete']= 'Portfolio Deleted!';
header('location:portfolio.php');

?>