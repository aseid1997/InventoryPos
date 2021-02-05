 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    
    <script src="plugins/sweetalert/sweetalert.js"></script>
<?php
include_once('connect_db.php');

session_start();

if(isset($_POST['btn_login'])){
    $useremail= $_POST['useremail'];
    $password = $_POST['password'];

    // echo $useremail . ' ' . $password;
    $sql = "SELECT * FROM tbl_user ";
    $sql .= "WHERE useremail= '$useremail' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($result);
    // echo $admin['useremail'];

    if($admin['useremail']== $useremail && $admin['password']== $password && $admin["role"]== "admin"){
       
        $_SESSION['userid']= $admin['userid'];
        $_SESSION['username']= $admin['username'];
        $_SESSION['useremail']= $admin['useremail'];
        $_SESSION['role']= $admin['role'];

        echo 'script type = "text/javascript">
        $(function validation(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                button: "Aww yiss!",
              });
        });
        </script>';

        header("location:dashboard.php");
    }
    else if($admin['useremail']== $useremail && $admin['password']== $password && $admin["role"]== "user"){
  
        $_SESSION['userid']= $admin['userid'];
        $_SESSION['username']= $admin['username'];
        $_SESSION['useremail']= $admin['useremail'];
        $_SESSION['role']= $admin['role'];

        echo 'script type = "text/javascript">
        $(function validation(){
            swal({
title: "Good Job!' . $_SESSION['username'].'";
text: "You clicked the button";
icon: success";
button: "Loading...."
            });
        });
        </script>';
        header("location:user.php");
    }
    else{
            echo "logination failed";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | POS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index2.html"><b>Inventory</b>POS</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="index.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="useremail" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                             
                                 <p class="mb-1">
                    <a href="#" onclick="swla('ToGet Password','Please Contactto Admin or Service Provider','error')">I forgot my password</a>
                </p> 
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

   
</body>

</html>