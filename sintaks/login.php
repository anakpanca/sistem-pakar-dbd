
<?php
session_start();
require "config.php";


if(isset($_POST["submit"])){


    $username=$_POST["username"];
    $pass=md5($_POST["pass"]);


    $sql = "SELECT*FROM users where username='$username' and pass='$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        
        // jika login berhasil
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";
    
       header("Location:index.php");


    } else {
        // jika login gagal
        header("Location:?msg=n");
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


</head>
<body class="bg-light">
    
<!-- validasi login gagal -->
<?php 
if(isset($_GET['msg'])){
    if($_GET['msg'] == "n"){
    ?>
    <div class="alert alert-danger font-italic" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Login Gagal,</strong> harap isi dengan teliti!
    </div>
    <?php
    }       
}
?>

    <div class="container-fluid" style="margin-top:70px">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <form method="POST" class="d-md-flex shadow">
                    <div class="card col-lg-6 border-white bg-transparent">
                        <img src="assets/img/bender_login.png" alt="Sambutan">
                    </div>
                    <div class="card col-lg-6 border-white bg-light pb-3">
                        <div class="card-header bg-light text-center border-0 pt-5 pb-4">
                            <h1 class="font-weight-bold text-primary">LOGIN</h1>
                            <h6 class="font-weight-light text-secondary">Silahkan Login terlebih dahulu untuk dapat mengakses seluruh layanan</h6>
                        </div>
                        <div class="card-body border-0 bg-light text-secondary">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" class="form-control shadow-sm border-white rounded-pill" name="username" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control shadow-sm border-white rounded-pill" name="pass" autocomplete="off" required>
                            </div>
                            <input class="btn btn-block bg-primary text-white shadow-sm border-white rounded-pill" type="submit" class="btn btn-primary" name="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>