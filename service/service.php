<?php session_start(); ?>
<?php require '../admin_header.php';?>
<?php 
require '../db.php';
$services= "SELECT * FROM services";
$services_res= mysqli_query($db_connect,$services);


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
 <div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Service</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['delete'])){ ?>
                <div class="alert alert-success"> <?= $_SESSION['delete']?></div>
                <?php } unset($_SESSION['delete'])?>
            <table class="table table-borderd">
                <tr>
                    <th>SL</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach($services_res as $sl=> $service){ ?>
                <tr>
                    <td> <?= $sl+1?> </td>
                    <td> <?=$service['title']?> </td>
                    <td><?=$service['short_desp']?>%</td>
                    <td>
                         <a href="status_change.php?id=<?= $service['id']?>" class="btn btn-<?=($service['status']==1?'success':'light')?>"> <?=($service['status']==1?'Active':'Deactive')?> </a>
                    </td>
                    <td>
                        <div class="d-flex">
                           <a href="delete_service.php?id=<?= $service['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
                         </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
 </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3> Add New service </h3>
            </div>
            <div class="card-body">
                        <?php if(isset($_SESSION['success'])){ ?>

                     <div class= 'alert alert-success'>  <?= $_SESSION['success']?> </div>
                     <?php } unset($_SESSION['success'])?>

               <form action="service_post.php" method="POST">
                <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name ="title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Short Description</label>
                        <input type="text" class="form-control" name ="short_desp">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class= 'btn btn-primary'>Add Service</button>
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