<?php 
session_start();

?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Form validation</title>
    <style>
        body{
            background: #ddd;
            padding: 30px;
        }
        #form1 form select,
       #form1 form input{
            border: 1px solid #4d4d4d;
        }
       #form1 form input:focus,
       #form1 form select{
            border: 1px solid #4d4d4d;
            box-shadow: none;
        }
        .form_btn{
            text-align: center;
        }
        .form_btn button{
            padding: 10px 30px;
            background: #ee2e24;
            border: none;
            font-size: 25px;
        }
        .form_btn button:focus{
            box-shadow: none;
        }
        .form-check-input:checked {
          background-color: #ee2e24;
          border-color: #ee2e24;
        }
        h1{
          text-align: center;
          background: #000;
          color: #fff;
          font-size: 30px;
          line-height: 55px;
          padding: 0;
          margin-bottom: 15px;
        }
    </style>
  </head>
  <body>
    <section id="form1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="">
                        <h1>Registration</h1>
                        <form action="register.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" id="name">
                                        <?php if(isset($_SESSION['name_error'])){?>
                                            <strong class= 'text-danger'>please enter your name</strong>
                                            <?php } unset($_SESSION['name_error']) ?>
                                      </div>
                                </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email">
                                <?php if(isset($_SESSION['email_error'])){?>
                                            <strong class= 'text-danger'> please enter your email </strong>
                                            <?php } unset($_SESSION['name_error']) ?>
                              </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password">
                                <?php if(isset($_SESSION['email_error'])){?>
                                            <strong class= 'text-danger'>please enter your password </strong>
                                            <?php } unset($_SESSION['pass_error']) ?>
                              </div>

                              <div class="radio_btn d-flex mb-3 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check ps-5">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" Male>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Female
                                    </label>
                                  </div>
                                  <?php if(isset($_SESSION['email_error'])){?>
                                            <strong class= 'text-danger'>please enter your sex </strong>
                                            <?php } unset($_SESSION['gender_error']) ?>
                              </div>

                              <div class="form_btn">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>
