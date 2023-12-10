<?php session_start(); ?>
<?php require '../admin_header.php';?>
<?php 
require '../db.php';
$about= "SELECT * FROM abouts";
$about_res= mysqli_query($db_connect,$about);
$after_assoc_about=mysqli_fetch_assoc($about_res);

?>
<!--**********************************
Sidebar end
***********************************-->

<!--**********************************
Content body start
***********************************-->
<div class="content-body">
<!-- row -->
<div class="container-fluid">
    <div class ="row">

    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3> Update About Information</h3>
            </div>
            <div class="card-body">
                        <?php if(isset($_SESSION['update'])){ ?>

                     <div class= 'alert alert-success'>  <?= $_SESSION['update']?> </div>
                     <?php } unset($_SESSION['update'])?>

               <form action="about_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb3">
                        <label for="" class="form-label">Nick Name</label>
                        <input type="text" class="form-control" name ="nick_name" value="<?= $after_assoc_about['nick_name']?>">
                    </div>
                    <div class="mb3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name ="name" value="<?=$after_assoc_about['name']?>">
                    </div>
                    <div class="mb3">
                        <label for="" class="form-label">Designation</label>
                        <input type="text" class="form-control" name ='designation' value="<?=$after_assoc_about['designation']?>">
                    </div>
                    <div class="mb3">
                        <label for="" class="form-label">Short Description</label>
                        <textarea name="short_desp" class= 'form-control' cols="20" rows="5"><?=$after_assoc_about['short_desp']?></textarea>
                    </div>

                    <div class="mb3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name ='image' onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                        <div class='my-2'> <img id="blah2" width="200" src="../uploads/about/ <?= $after_assoc_about['image']?>" alt=""></div>
                        <?php if(isset( $_SESSION['exten2'])){ ?>
                            <strong class="text-danger"><?= $_SESSION['exten2']?></strong>
                        <?php } unset( $_SESSION['exten2']) ?>
                        
                    </div>
                    <div class="mb3">
                       <button type="submit" class= 'btn btn-primary'>Update</button>
                    </div>

                              
                </form>
            </div>
        </div>
    </div>
    
    </div>
</div>
</div>
<!--**********************************
Content body end
***********************************-->

<!--**********************************
Footer start
***********************************-->

<?php require '../admin_footer.php';?>