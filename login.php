<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/deadlock/admin_asset/images/favicon.png">
    <link href="/deadlock/admin_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

     <body class="h-100">
    <div class="authincation h-100">
     <div class="container h-100">
     <div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
    <div class="authincation-content">
    <div class="row no-gutters">
    <div class="col-xl-12">
    <div class="auth-form">
	<div class="text-center mb-3">
	<a href="index.html"><img src="deadlock/admin_asset/images/logo-full.png" alt=""></a>
	</div>
     <h4 class="text-center mb-4 text-white">Sign in your account</h4>
     <form action="login_abs.php" method="POST">
    <div class="form-group">
    <label class="mb-1 text-white"><strong>Email</strong></label>
    <input type="email"name="email"class="form-control" value="hello@example.com" 
    style="border-color: <?=(isset($_SESSION["invalid"])?'red':'' ) ?>;"> 
    <?php if (isset($_SESSION["invalid"])) { ?>
   <strong class = "text-danger">  <?=$_SESSION["invalid"]?> </strong> 
    <?php }
     unset ( $_SESSION["invalid"]) ?> 
    </div>
        
    <div class="form-group">
    <label class="mb-1 text-white"><strong>Password</strong></label>
    <input type="password"name="password" class="form-control" value="Password"style="border-color: <?=(isset($_SESSION["wrong"])?'red':'' ) ?>;">>

    <?php if (isset($_SESSION["wrong"])) { ?>
    <strong class = "text-danger"> <?=$_SESSION['wrong']?> </strong> 
    <?php }
     unset ( $_SESSION["wrong"]) ?> 
     </div>

    <div class="text-center">
    <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
    </div>
    </form>
    <div class="new-account mt-3">
    <p class="text-white">Don't have an account? <a class="text-white"
     href="index_registerabs.php">Sign up</a></p>
     </div>
     </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
     <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/deadlock/admin_asset/vendor/global/global.min.js"></script>
	<script src="/deadlock/admin_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/deadlock/admin_asset/js/custom.min.js"></script>
    <script src="/deadlock/admin_asset/js/deznav-init.js"></script>

</body>

</html>