<?php 
require '../db.php';
$id = $_GET['id'];

$select = "SELECT * FROM expertise WHERE id=$id ";
$select_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_res);


if($after_assoc['status'] ==1){
   $update = "UPDATE expertise SET status=0 WHERE id=$id";
   mysqli_query($db_connect, $update);
   header('location:expertise.php');
}
else{
    $update = "UPDATE expertise SET status=1 WHERE id=$id";
   mysqli_query($db_connect, $update);
   header('location:expertise.php');
}


?>