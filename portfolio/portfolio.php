<?php session_start(); ?>
<?php require '../admin_header.php';?>
<?php 
require '../db.php';
$portfolios= "SELECT * FROM portfolios";
$portfolios_res= mysqli_query($db_connect,$portfolios);


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
            <h3>Portfolio</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['delete'])){ ?>
                <div class="alert alert-success"> <?= $_SESSION['delete']?></div>
                <?php } unset($_SESSION['delete'])?>
            <table class="table table-borderd">
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach($portfolios_res as $sl=> $portfolio){ ?>
                <tr>
                    <td> <?= $sl+1?> </td>
                    <td> <?=$portfolio['title']?> </td>
                    <td><?=$portfolio['category']?>%</td>
                    <td> <img width="50" src="../uploads/portfolio/<?= $portfolio['image']?> " alt=""> </td>
                    <td>
                         <a href="status_change.php?id=<?= $portfolio['id']?>" class="btn btn-<?=($portfolio['status']==1?'success':'light')?>"> <?=($portfolio['status']==1?'Active':'Deactive')?> </a>
                    </td>
                    <td>
                        <div class="d-flex">
                           <a href="delete_portfolio.php?id=<?= $portfolio['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
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
                <h3> Add New Portfolio </h3>
            </div>
            <div class="card-body">
                        <?php if(isset($_SESSION['success'])){ ?>

                     <div class= 'alert alert-success'>  <?= $_SESSION['success']?> </div>
                     <?php } unset($_SESSION['success'])?>

               <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name ="title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control" name ="category">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Portfolio Image</label>
                        <input type="file" class="form-control" name ="image">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class= 'btn btn-primary'>Add Portfolio</button>
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