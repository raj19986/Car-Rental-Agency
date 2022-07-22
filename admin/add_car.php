<?php 

include 'db_connect.php';

if(!$_SESSION['ADMIN_ID']){  // check panel Login
    header('location:login.php');
    $_SESSION['invalid_login']="Please Try With Login Details";
}
$admin_id  = $_SESSION['ADMIN_ID'] ; 
if(isset($_POST['submit'])) {
    
    extract($_POST);
    $vehicle_model=   mysqli_real_escape_string($conn, $_POST['vehicle_model']);
    $vehicle_number  = mysqli_real_escape_string($conn, $_POST['vehicle_number']);
    $seating_capacity =  mysqli_real_escape_string($conn, $_POST['seating_capacity']);
    $rent_per_day =mysqli_real_escape_string($conn, $_POST['rent_per_day']);
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;
    if($_FILES['image']['name']){
		move_uploaded_file($image,  $uploads_dir);
	}

        $sql = "insert into  tbl_car( `vehicle_model`, `vehicle_number`,  `seating_capacity`,  `rent_per_day`,`image` ,`admin_id`) 
         values ('$vehicle_model','$vehicle_number','$seating_capacity','$rent_per_day','$image','$admin_id')";
        $query = mysqli_query($conn, $sql);
        print_r($image);
    
        if( $query){
            move_uploaded_file($image_tmp_name, $image_folder);
            
          $msg = '<div class="alert alert-success"> Car Added Successfull</div>';
           
            header('location:listing.php');
            $_SESSION['success-msg']='<div class="alert alert-success">Car Added Successfully</div>';
            
        }else{
     
        header('location:add_car.php');
            $_SESSION['success-msg']='<div class="alert alert-danger"> Not Added, Please Try again</div>';
          $msg = '<div class="alert alert-danger">Not Added, Please Try again</div>';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include 'header.php'; ?>
    <div id="layoutSidenav">
      <?php include 'sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add car</li>
                    </ol>

                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <?php 
       
                        if(isset($_SESSION['success-msg'])){
                            echo $_SESSION['success-msg'];
                            unset($_SESSION['success-msg']);
                        }
                        
                        ?>
                    <form  method="post" action="add_car.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Vehicle model</label>
                                <input type="text" class="form-control" name="vehicle_model" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Vehicle number</label>
                                <input type="text" class="form-control" name="vehicle_number" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Seating capacity</label>
                            <input type="number" class="form-control" name="seating_capacity" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Rent per day</label>
                            <input type="text" class="form-control" name="rent_per_day" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Vehicle Image</label>
                            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG" required>
                        </div>
                      <div class="form-group col-md-6">
                        <button type="submit" name="submit" class="btn btn-primary">Add car</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>

</html>