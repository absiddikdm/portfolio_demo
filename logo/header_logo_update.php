<?php 
session_start();
require '../db.php';

$header_logo=$_FILES['header_logo'];
$after_explode = explode('.', $header_logo ['name']);
$extension = end ($after_explode);
$allowed_extension = ['jpg','jfif', 'png'];
$select_logo= "SELECT * FROM logos WHERE id = 1";
$select_logo_res=  mysqli_query($db_connect,$select_logo);
$after_assoc= mysqli_fetch_assoc($select_logo_res);


if(in_array($extension,$allowed_extension)){

if($header_logo ['size'] <= 512000 ){

 $delete_from ='../uploads/logo/'. $after_assoc['header_logo'];
unlink($delete_from);

    $file_name = 'header_logo' . '.' . $extension;
    $new_location='../uploads/logo/'. $file_name;
    move_uploaded_file($header_logo['tmp_name'], $new_location);
    $update= "UPDATE logos SET header_logo = '$file_name' WHERE id=1";
    mysqli_query($db_connect,$update);
    $_SESSION[ 'header_logo']= 'Header Logo updated Successfully';
    header('location:logo.php');
    } 
    else{
        $_SESSION['exten']= 'maximum Image Size 512 KB';
         header('location:logo.php');
    }
    }
    else{
    $_SESSION['exten']= 'Invalid Extension';
        header('location:logo.php');
    }
?>