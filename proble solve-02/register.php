<?php
session_start();



$name = $_post['name'];
$email = $_post['email'];
$password = $_post['password'];
$gender = $_post['gender'];
$flag= false;
if(!$name){
    $flag=true;
    $_SESSION['name_error']='enter your name';
}
if(!$email){
    $flag=true;
    $_SESSION['email_error']='enter your email';
}
if(!$password){
    $flag=true;
    $_SESSION['pass_error']='enter your password';
}
else{
    $upper= preg_match('[A-Z]',$password);
    $lower= preg_match('[a-z]',$password);
    $number= preg_match('[0-9]',$password);
    $spsl= preg_match('[$, &, @, *, %, <, >, /, \, +, -, ]',$password);
    if(!$upper||!$lower||!$number||!$spsl|| strlen($password<8)){
        $_SESSION['pass_error']='upper case, lower case, special, number & minimun 8 char';
    }
}
if(!$gender){
    $flag=true;
    $_SESSION['gender_error']='enter your gender';
}
if($flag){
    header('location: from.php ');
}
else{
    echo $name;
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $password;
    echo '<br>';
    echo $gender;

}
?>