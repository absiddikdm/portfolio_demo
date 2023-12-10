<?php
session_start();
require "db.php";

$email= $_POST['email'];
$password= $_POST['password'];

$select= "SELECT COUNT(*) as paici FROM users WHERE email= '$email'";                 
 $select_query = mysqli_query($db_connect,$select);
 $after_assoc = mysqli_fetch_assoc($select_query);
 
 if($after_assoc['paici']==1){
    $user="SELECT * FROM users WHERE email='$email'";
    $user_query=mysqli_query($db_connect,$user);
    $after_assoc_user =mysqli_fetch_assoc($user_query);
    if(password_verify($password, $after_assoc_user['password'])){
      $_SESSION['login_korche']='ho login_korche';

      $_SESSION['user_id']= $after_assoc_user['id'];

      header('location:admin.php');
    }
    else{
      $_SESSION['wrong']='password wrong!';
      header('location:login.php');
    }
 }
 else{
  $_SESSION['invalid']='Invalid Email Address';
  header('loction:login.php');
 }

 
?>