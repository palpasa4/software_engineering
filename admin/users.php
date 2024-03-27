<?php include "header.php";
include "../config.php";
if($admin!=1)
{
   header("location:index.php");
}
if(!isset($_GET['page']))
{
	$page=1;
}
else{
	$page=$_GET['page'];

}
$limit=5;
$offset=($page-1)*$limit; 
$sql="SELECT * FROM user LIMIT $offset,$limit";
$query=mysqli_query($config,$sql);
$rows=mysqli_num_rows($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Users</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_user.php">
               <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
            </a>
         </div>
         <!--<div>
            <form class="navbar-search">
               <div class="input-group">
                  <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                  <div class="input-group-append">
                     <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
                  </div>
               </div>
            </form>
         </div>-->
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  if($rows)
                  {
                     while($result=mysqli_fetch_assoc($query))
                     {
                        ?>
                        <tr>
                           <td><?= ++$offset  ?></td>
                           <td><?= $result['username']  ?></td>
                           <td><?= $result['email']  ?></td>
                           <td><?php
                                 $role=$result['role'];
                                 if($role==1)
                                 {
                                    echo "Admin";
                                 }
                                 else{
                                    echo "User";
                                 }
                           ?>
                           </td>
                           <td>
                           <?php
                                 $role=$result['role'];
                                 if($role==0)
                                 {?>
                                    <form class="" action="" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                           <input type="hidden" name="userid" id="" value="<?= $result['user_id']?>">
                           <input type="submit" name="deleteUser" value="Delete" class="btn btn-sm btn-danger">
                           </form><?php
                                 }?>
                           </td>
                        </tr>
                        <?php
                     }
                  }
                  else{
                     ?>
                     <tr><td>No record foung</td></tr>
                     <?php
                     
                  }
                  ?>
               </tbody>
            </table>
            <?php
			$pagination="SELECT * FROM user";
			$run_q=mysqli_query($config,$pagination);
			$total_post=mysqli_num_rows($run_q);
		    $pages=ceil($total_post/$limit);
			if($total_post>$limit)
			{
			?>
			<ul class="pagination pt-2 pb-5">
				<?php 
				for ($i=1; $i <= $pages; $i++) { 
				?>
				<li class="page-item <?=($i==$page)? $active="active":""?>">
					<a href="users.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<?php include 'footer.php';
if(isset($_POST['deleteUser'])){
   $id=$_POST['userid'];
   $delete="DELETE FROM user WHERE user_id='$id'";
   $run=mysqli_query($config,$delete);
   $delete1="DELETE FROM blog WHERE author_id='$id'";
   $run1=mysqli_query($config,$delete1);

   if($run && $run1)
   {
      $msg=['User and the posts from this user have been deleted successfully.','alert-success'];
            $_SESSION['msg']=$msg;
            header('location:users.php');
   }
   else{
      $msg=['Failed, try again.','alert-danger'];
            $_SESSION['msg']=$msg;
            header('location:users.php');
   }
}
?>