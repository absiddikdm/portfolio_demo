<?php

session_start();

require '../db.php';

$id = $_POST['user_id'];
$name = $_POST['name'];
$password = $_POST['password'];
$after_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
// $image = $_FILES['image'];

if(empty($password)){
    $update = "UPDATE users SET name = '$name' WHERE id=$id";
    mysqli_query($db_connect, $update);

    $_SESSION['update'] = "Profile Info Update";
    header('location: profile.php');
}
else{
    $update = "UPDATE usersdata SET name = '$name', password='$after_hash' WHERE id=$id";
    mysqli_query($db_connect, $update);

    $_SESSION['update'] = "Profile Info Update";
    header('location: profile.php');
}



?>