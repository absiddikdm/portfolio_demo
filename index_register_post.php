<?php

session_start(); 
require'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password=$_POST['password'];
$after_hash= password_hash($password,PASSWORD_DEFAULT);
$gender=$_POST['gender'];
$flag = false;

if(!$name){
    $flag = true;
    $_SESSION["name_error"]= "please input your name";
}
if(!$email){
    $flag = true;
    $_SESSION["email_error"]= "please input your email";
}
else {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL )) {
        $flag = true;
        $_SESSION["email_error"]= "please input your valid email";
    }
}
if(!$password){
    $flag = true;
    $_SESSION["password_error"]= "please input your password";
}
else{
    $upper= preg_match('@[A-Z]@',$password);
    $lower= preg_match('@[a-z]@',$password);
    $number= preg_match('@[0-9]@',$password);
    $special= preg_match('@[#,$,%,^,&,/,\,*]@',$password);


    if(!$upper ||!$lower ||!$number ||!$special|| strlen($password)<8 ){
        $flag = true;
        $_SESSION["password_error"]= "please input upper case, lower case, number, special character, and minimum 8 character";
    }
}
if(!$gender){
    $flag = true;
    $_SESSION["gender_error"]= "please input your Gender";
}

if($flag) {
    header('location:index_register.php');
}

else{

    $select= "SELECT COUNT(*) as 'paici' FROM users WHERE email= '$email'";
 $select_query = mysqli_query($db_connect,$select);
 $after_assoc= mysqli_fetch_assoc($select_query);
 if($after_assoc['paici']== 0){
$insert= "INSERT INTO users(name,email,password,gender) VALUES('$name', '$email','$after_hash','$gender')";
 mysqli_query($db_connect,$insert);
 $_SESSION['success']='User Registerd success!';
 header('location:index_registerabs.php');

 }
 else{
    $_SESSION['exist']='email already exsist!';
 header('location:index_registerabs.php');
 }



}

?>