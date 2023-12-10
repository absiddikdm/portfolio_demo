<?php

session_start();

require '../db.php';

$id = $_SESSION['user_id'];
$image = $_FILES['image'];
$after_explode = explode('.', $image['name']);
$extension = end($after_explode);
$allowed_extension = ['jpg', 'png', 'webp'];

$user = "SELECT * FROM  users WHERE id =$id";
$user_res = mysqli_query($db_connect, $user);
$after_assoc=mysqli_fetch_assoc($user_res);

if($after_assoc['image'] == null){
    if(in_array($extension, $allowed_extension)){
        if($image['size'] <=512000){
            $file_name = $id.'.'.$extension;
          $new_locaton ='../uploads/user/'.$file_name;
          move_uploaded_file($image['tmp_name'],$new_locaton );
          $update = "UPDATE users SET image='$file_name' WHERE id=$id";
           mysqli_query($db_connect, $update);
          $_SESSION['photo_update'] = 'Profile Image Updated!';
          header('location: profile.php');
        }
        else{
            $_SESSION['exten'] = 'Maximum Image Size 512kb';
            header('location: profile.php');
        }
    }
    else{
        $_SESSION['exten'] = 'image must be tye of jpg, png or webp';
        header('location: profile.php');
    }
}
else{

if(in_array($extension, $allowed_extension)){
    if($image['size'] <=512000){
        $delete_from = '../uploads/user'.$after_assoc['image'];
       unlink($delete_from);
        $file_name = $id.'.'.$extension;
      $new_locaton ='../uploads/user/'.$file_name;
      move_uploaded_file($image['tmp_name'],$new_locaton );
      $update = "UPDATE users SET image='$file_name' WHERE id=$id";
      mysqli_query($db_connect, $update);
      $_SESSION['photo_update'] = 'Profile Image Updated!';
      header('location: profile.php');
    }
    else{
        $_SESSION['exten'] = 'Maximum Image Size 512kb';
        header('location: profile.php');
    }
}
else{
    $_SESSION['exten'] = 'image must be tye of jpg, png or webp';
    header('location: profile.php');
}

}


?>