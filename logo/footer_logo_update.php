<?php 
session_start();
require '../db.php';

$footer_logo=$_FILES['footer_logo'];
$after_explode = explode('.', $footer_logo ['name']);
$extension = end ($after_explode);
$allowed_extension = ['jpg','jfif', 'png'];

$select_logo= "SELECT * FROM logos WHERE id = 1";
$select_logo_res=  mysqli_query($db_connect,$select_logo);
$after_assoc= mysqli_fetch_assoc($select_logo_res);


if(in_array($extension,$allowed_extension)){

if($footer_logo ['size'] <= 512000 ){

 $delete_from ='../uploads/logo/'. $after_assoc['footer_logo'];
unlink($delete_from);

    $file_name = 'footer_logo' . '.' . $extension;
    $new_location='../uploads/logo/'.$file_name;
    move_uploaded_file($footer_logo['tmp_name'], $new_location);
    $update= "UPDATE logos SET footer_logo = '$file_name' WHERE id= 1";
    mysqli_query($db_connect,$update);
    $_SESSION ['footer_logo']= 'Footer Logo updated Successfully';
    header('location:logo.php');
    } 
    else{
        $_SESSION['exten2']= 'maximum Image Size 512 KB';
         header('location:logo.php');
    }
    }
    else{
    $_SESSION['exten2']= 'Invalid Extension';
        header('location:logo.php');
    }
?>