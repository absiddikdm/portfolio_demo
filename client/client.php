<?php
session_start();
    require'../db.php';

    $select="SELECT * FROM messages";
    $select_result= mysqli_query($db_connect, $select);

  $total ="SELECT COUNT(*) as total FROM messages";
  $total_user=mysqli_query($db_connect, $total);
  $total_user_assoc=mysqli_fetch_assoc($total_user);
?>
<?php require'../admin_header.php';?>


        <div class="content-body">
    <!-- row -->
	<div class="container-fluid">
	<div class="row">


  <div class="com-lg-8 m-atuo mt-3">
<div class="card">
<div class="card-header  text-center">
<h3>Client List</h3>
<p>Total User:<?=$total_user_assoc['total']?></p>
</div>
<div class="card-body">
<table class="table tabel-striped">
<tr>
 <th>SL</th>
<th>Name</th>
<th>Email</th>
<th>subject</th>
<th>message</th>
<th>Action</th>
</tr>
<?php foreach($select_result as $key=> $client) { ?>
<tr>
<td><?=$key+1?></td>
<td><?=$client['name']?></td>
<td><?=$client['email']?></td>
<td><?=$client['subject']?></td>
<td><?=$client['message']?></td>
<td>
<div class="d-flex">
<a data-link="client_delete.php?id=<?=$client['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
</div>
 <td>
</tr>
<?php } ?>

	</div>
    </div>
    </div>
    <!--**********************************
      Content body end
     ***********************************-->


 <?php require '../admin_footer.php';?>

<script>
  $('.del').click(function(){
        var link =$(this).attr('data-link');
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
  }
})

  })
 </script>
 <?php if(isset($_SESSION['delete'])){ ?>
  <script>
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  </script>
  <?php } unset($_SESSION['delete'])?>






