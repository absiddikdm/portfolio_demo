<?php
session_start();
 require '../db.php';
 $nick_name=$_POST['nick_name'];
 $name=$_POST['name'];
 $designation=$_POST['designation'];
 $short_desp=$_POST['short_desp'];
 $image=$_FILES['image'];
 
 if($image['name'] ==''){
       $update="UPDATE abouts SET nick_name ='$nick_name',name ='$name', designation = '$designation',short_desp = '$short_desp', WHERE id=1";
        $update_res= mysqli_query($db_connect,$update);
 }
else{
    $after_explode = explode('.', $image ['name']);
    $extension = end ($after_explode);
    $allowed_extension = ['jpg','webp', 'png'];
    
    $select_image = "SELECT * FROM abouts WHERE id = 1";
    $select_image_res=  mysqli_query($db_connect,$select_image);
    $after_assoc= mysqli_fetch_assoc($select_image_res);

    if(in_array($extension,$allowed_extension)){

        if($image ['size'] <= 512000 ){
         $delete_from ='../uploads/about/'. $after_assoc['image'];
        unlink($delete_from);
        
            $file_name = 'about' . '.' . $extension;
            $new_location='../uploads/about/'.$file_name;
            move_uploaded_file($image['tmp_name'], $new_location);
            $update="UPDATE abouts SET nick_name ='$nick_name',name = '$name', designation = '$designation',short_desp = '$short_desp', image ='$file_name'  WHERE id=1";
            $update_res= mysqli_query($db_connect,$update);
            $_SESSION['update']= 'About Updated Successfully';
            header('location:about.php');
            } 
            else{
                $_SESSION['exten2']= 'maximum Image Size 512 KB';
                 header('location:about.php');
            }
            }
            else{
            $_SESSION['exten2']= 'Invalid Extension';
                header('location:about.php');
            }

}


 ?>
