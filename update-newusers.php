<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$id=$_GET['updateid'];
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['ccmsaid'];
 $username=$_POST['username'];
$uadd=$_POST['uadd'];
$mobilenumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$cname=$_POST['cname'];
$idproof=$_POST['idproof'];
$entryid=mt_rand(100000000, 999999999);

$sql="update tblusers set ID=$id,UserName=' $username',UserAddress='$uadd',MobileNumber='$mobilenumber',Email='$email',ComputerName='$cname',IDProof='$idproof' where ID='$id'";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);

    if ($query) {
echo '<script>alert("User Detail has been updated.")</script>';
//echo "<script>window.location.href ='add-users.php'</script>";

  }
  else
    {
 echo '<script>alert("Something Went Wrong. Please try again.")</script>';       
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>CCMS User Details</title>
    

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
                        <h1>Update user</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-users.php">Update user</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Update</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                             
                            <?php
                                $id=$_GET['updateid'];
                                $sql="select * from  tblusers where ID='$id'";
                                $query=mysqli_query($con,$sql);
                                $cnt=1;
              while($row=mysqli_fetch_array($query))
              {
              ?>    
               <div class="card-body card-block">

                                <div class="form-group"><label for="company" class=" form-control-label">User Name</label><input type="text" name="username" value="<?php echo $row['UserName'];?>" class="form-control" id="username" required="true"></div>
                                                                          
                                        <div class="form-group"><label for="street" class=" form-control-label">User Address</label><textarea type="text" name="uadd" value="<?php echo $row['UserAddress'];?>" id="uadd" class="form-control" required="true"></textarea></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Mobile Number</label><input type="text" name="mobilenumber" id="mobilenumber" value="<?php echo $row['MobileNumber'];?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+"></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Email</label><input type="email" name="email" id="email" value="<?php echo $row['Email'];?>" class="form-control" required="true"></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Computer Name</label><select type="text" name="cname" id="cname" value="<?php echo $row['ComputerName'];?>" class="form-control" required="true">
                                                    <option value="">Choose Computer</option>
                                
              <option value="<?php echo $row['ComputerName'];?>"><?php echo $row['ComputerName'];?></option>
                   
                                                    </select></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">ID Proof</label><input type="text" name="idproof" id="idproof" value="<?php echo $row['IDProof'];?>" class="form-control" required="true"></div>
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                    </div>
                                                    <?php $cnt=$cnt+1; } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>Update
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php  } ?>