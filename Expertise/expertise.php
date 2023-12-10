<?php session_start(); ?>
<?php require '../admin_header.php';?>
<?php 
require '../db.php';
$expertise= "SELECT * FROM expertise";
$expertise_res= mysqli_query($db_connect,$expertise);


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
            <h3>Expertise</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['delete'])){ ?>
                <div class="alert alert-success"> <?= $_SESSION['delete']?></div>
                <?php } unset($_SESSION['delete'])?>
            <table class="table table-borderd">
                <tr>
                    <th>SL</th>
                    <th>Topic</th>
                    <th>Percentange</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach($expertise_res as $sl=> $skill){ ?>
                <tr>
                    <td> <?= $sl+1?> </td>
                    <td> <?=$skill['topic_name']?> </td>
                    <td><?=$skill['percentage']?>%</td>
                    <td>
                         <a href="status_change.php?id=<?= $skill['id']?>" class="btn btn-<?=($skill['status']==1?'success':'light')?>"> <?=($skill['status']==1?'Active':'Deactive')?> </a>
                    </td>
                    <td>
                        <div class="d-flex">
                           <a href="delete_expertise.php?id=<?= $skill['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
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
                <h3> Add New Expertise </h3>
            </div>
            <div class="card-body">
                        <?php if(isset($_SESSION['success'])){ ?>

                     <div class= 'alert alert-success'>  <?= $_SESSION['success']?> </div>
                     <?php } unset($_SESSION['success'])?>

               <form action="expertise_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="" class="form-label">Topic Name</label>
                        <input type="text" class="form-control" name ="topic_name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Percentange</label>
                        <input type="number" class="form-control" name ="percentage">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class= 'btn btn-primary'>Add Expertise</button>
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