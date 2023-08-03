<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   
    //code to delete

   if(isset($_GET['id']))
   {
   $id=$_GET['id'];
   $sql="delete from tblusers where ID='$id'";
   $ret=mysqli_query($con,$sql);
   if($ret)
   {  
       echo "<script>alert('Data deleted');</script>";
       echo "<script>window.location.href = 'manage-newusers.php'</script>";
   }
    else{
       echo "failed to delete";
    }
        
   }

  }
  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>CCMS New Users</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-newusers.php">New Users</a></li>
                            <li class="active">New Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">New Users</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
                  <th>EntryID</th> 
                  <th>Full Name</th>
                 <th>Action</th>
                 <th>Update</th>
                 <th>View users</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$sql="select *from tblusers where Status=''";
$ret=mysqli_query($con,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
             <td><?php  echo $row['EntryID'];?></td>
                  <td><?php  echo $row['UserName'];?></td>


                
                  <td><a href="manage-newusers.php?id=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to Delete ?');" class="btn btn-danger">Delete</a></td>
                  <td><button class ="btn btn-primary"><a href="update-newusers.php? updateid=<?php echo $row['ID'];?>" class="text-white">Edit</a></button></td>
                     <td ><a href="view-user-detail.php?upid=<?php echo $row['ID'];?>">View</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php   ?>