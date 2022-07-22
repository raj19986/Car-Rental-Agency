<?php 

include 'db_connect.php';

if(!$_SESSION['ADMIN_ID']){  // check panel Login
    header('location:login.php');
    $_SESSION['invalid_login']="Please Try With Login Details";
}

$admin_id  = $_SESSION['ADMIN_ID'] ;
$sql="SELECT * FROM `tbl_booked_vehicles` where admin_id = '$admin_id'";
$query=mysqli_query($conn, $sql);
$booked_vehicle_count =mysqli_num_rows($query);

$sql="SELECT * FROM `tbl_car` where delete_flag = 0 and admin_id = '$admin_id'";
$query=mysqli_query($conn, $sql);
$total_vehicles=mysqli_num_rows($query);

$result = mysqli_query($conn, "select * from  tbl_admin  where   id='$admin_id' " );
$row=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
                    <h1 class="mt-4">  Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-3">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total vehicle
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php echo $total_vehicles; ?></p>
                                    <div class="small text-white"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Booked vehicle
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php echo $booked_vehicle_count ?></p>
                                    <div class="small text-white"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                     <div class="row">
                        <div class="col-md-6 m-auto">
                            <div class="form-row">
                         
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" readonly
                                        value="<?php echo $row['name'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" readonly
                                        value="<?php echo $row['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" readonly
                                    value="<?php echo $row['phone'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" readonly
                                    value="<?php echo base64_decode($row['password']); ?>">
                            </div>



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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>