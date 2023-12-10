<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .pass_div {
     position : relative;
    } 
    .pass_div i {
      position:absolute;
      top: 32px;
      right:0;
      width:36px;
      height:36px;
      background:green;
      color:white;
      text-align:center;
      line-height:36px;
      border-top-right-radius:5px;
      cursor:pointer;

    }
  </style>
  </head>
  <body>
         <div class="container">
        <div class="row">
        <div class="col-lg-6 m-auto">
        <div class="card mt-3">
        <div class="card-header bg-success">
        <h3 class="text-white"> Register User </h3>
        </div>
       <div class="card-body">
        <?php if(isset($_SESSION['exist'])){ ?>
       <div class="alert allert-success"><?= $_SESSION['exist']?></div>
       <?php }unset($_SESSION['exist'])?>

       <?php if(isset($_SESSION['success'])){ ?>
      <div class="alert allert-warning"><?= $_SESSION['success']?></div>
      <?php }unset($_SESSION['success'])?>


         <form action="index_register_post.php"  method="POST">
           <div class="mb-3">
           <label class="form-label">Name</label>

            <input name="name" style="border-color: <?=(isset($_SESSION["name_error"])?'red':'' ) ?> ;" type="text" class="form-control" placeholder=" Enter your name here" >
              <?php if (isset($_SESSION["name_error"])) { ?>
              <strong class = "text-danger">   <?php echo  $_SESSION["name_error"]?> </strong> 
              <?php }
               unset ( $_SESSION["name_error"]) 
              ?> 
              
              </div>

           <div class="mb-3">
           <label class="form-label">Email</label>

           <input name="email" style="border-color: <?=(isset($_SESSION["email_error"])?'red':'' ) ?> ;" type="email" class="form-control" placeholder=" Enter your email here" >
             <?php if (isset($_SESSION["email_error"])) { ?>
              <strong class = "text-danger">   <?php echo  $_SESSION["email_error"]?> </strong> 
              <?php }
               unset ( $_SESSION["email_error"]) 
              ?> 

       </div>
      <div class="mb-3 pass_div">
    <label class="form-label">password</label>

         <input id="pass"name="password" style="border-color: <?=(isset($_SESSION["password_error"])?'red':'' ) ?> ;" type="password" class="form-control" placeholder=" Enter your password here" >
        <?php if (isset($_SESSION["password_error"])) { ?>
              <strong class = "text-danger">   <?php echo  $_SESSION['password_error']?> </strong> 
              <?php }
               unset ( $_SESSION["password_error"]) 
              ?> 
              <i  id="show_pass"class="fa fa-eye"> </i>

  </div>
  <div class="mb-3 pass_div">
    <label class="form-label">Select Gender </label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gen1" value='male' >
  <label class="form-check-label" for="gen1">
    Male
  </label>
 </div>
 <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gen2" value='female' >
  <label class="form-check-label" for="gen2">
   Female
  </label>
 </div>
  <?php if (isset($_SESSION["gender_error"])) { ?>
  <strong class = "text-danger">   <?php echo  $_SESSION['gender_error']?> </strong> 
   <?php }
   unset ( $_SESSION["gender_error"]) 
              ?> 
   
  

  <button type="submit" class=" btn btn-success">Submit</button>
</form>
    </div>
 </div> 
  </div>
  </div>
  </div> 

 <script src="assets/js/bootstrap.min.js"> </script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script> 
  $('#show_pass').click(function(){
 var pass = document. getElementById("pass");
 if(pass.type =='password'){
  pass.type = 'text';
 }
 else{
  pass.type="password";
 }
  })
  </script>
  </body>

</html>