<?php

session_start();

?>


<?php require '../admin_header.php';?>


<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="profile_update.php" method="POST">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?=$after_assoc_user_info['name'] ?>"> 
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"> 
                            </div>
                            <input type="hidden" name="user_id" value="<?=$after_assoc_user_info['id'] ?>">
                            
                            <div class="mb-3">
                                 <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Image</h3>
                    </div>
                    <div class="card-body">
                                <?php if(isset($_SESSION['photo_update'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['photo_update']?></div>
                                <?php } unset($_SESSION['photo_update']) ?>
                        <form action="image_update.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" onchange="document.getElementById('blah')
                                .src = window.URL.createObjectURL(this.files[0])">
                                
                                <div class="my-2">
                                <img width="200" src="" id="blah" alt="">
                                </div>
                                </div>
                                <?php if(isset($_SESSION['exten'])){?>
                                    <strong class='text-danger'><?=$_SESSION['exten']?></strong>
                                <?php } unset($_SESSION['exten']) ?>
                            </div>
                            <div class="mb-3">
                                 <button type="submit" class="btn btn-primary">Update Image</button>
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

<?php require '../admin_footer.php';?>

<?php if(isset($_SESSION['update'])){?>
        <script>
            Swal.fire(
                'Good job!',
                '<?=$_SESSION['update']?>',
                'success'
                )
        </script>                    
 <?php } unset($_SESSION['update'])?>