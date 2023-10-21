<?php
require_once('../config.php');

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = $userId";
$result = executeQuery($sql);

if ($result && $result->num_rows === 1) {
    $adminData = $result->fetch_assoc();
    $adminName = $adminData['username'];
} else {
    $adminName = "Admin";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap4 library linked-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!--custom style-->
  <style type="text/css">
   .registration-form{
      background: #f7f7f7;
      padding: 20px;
     
      margin: 100px 0px;
    }
    .err-msg{
      color:red;
    }
    .registration-form form{
      border: 1px solid #e8e8e8;
      padding: 10px;
      background: #f3f3f3;
    }
  </style>
</head>
<body>
<div class="container-fluid">
 <div class="row">
   <div class="col-sm-4">
   </div>
   <div class="col-sm-4">
    
    <!--====registration form====-->
    <div class="registration-form">
      <h4 class="text-center">Username : <?php echo $adminName; ?> </h4>
    
<br/>

    <div class="container">
        <div class="dashboard">
            <h2 align ="center" >Admin Dashboard</h2>

            <div class="form-control col-sm-15">
                <a href="category.php">Manage Categories</a>
                </div><BR/>
                <div class="form-control col-sm-15">

                <a href="products.php">Manage Products</a>
            </div>
<BR/>
            <div align="center">
                <form method="post" action="../logout.php">
                <input type="submit" class="btn btn-secondary" value="Logout">
                   
                </form>
            
   </div>
  
   </div>
 </div>
  
</div>

            </div>
        </div>
    </div>
</body>
</html>
