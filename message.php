<?php session_start(); ?>
<?php 
require 'db.php';

if(isset ($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

 $insertData = "INSERT INTO messages(name,email,subject,message)VALUES('$name', '$email','$subject','$message')";
 $query = mysqli_query( $db_connect, $insertData );

 if($query){
     $_SESSION['success']= "Message Send Doen";
       
    header("location:index.php");


 }

}


?>