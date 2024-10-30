<?php 
session_start();
if(isset($_GET['logout']))
if($_GET['logout']=='yes'){
    if(isset($_SESSION['nguoidung']))
    unset($_SESSION['nguoidung']);
    if(isset($_SESSION['cart']))
unset($_SESSION['cart']);
}

?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fontawesome-all.css">
    <link rel="stylesheet" href="./css/style2.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <?php
    if (isset($_GET['dn'])) {
        if ($_GET['dn']=='true') {
            echo '<style type="text/css">
            #dntb {
                display: none;
            }
            </style>';
        } else if ($_GET['dn']=='false') {
            echo '<style type="text/css">
            #dntb {
                display: inline;
            }
            </style>';
        }
        if ($_GET['dn']=='true') {
            echo '<style type="text/css">
            #dnbk {
                display: none;
            }
            </style>';
        } else if ($_GET['dn']=='khoa') {
            echo '<style type="text/css">
            #dnbk {
                display: inline;
            }
            </style>';
        }
    }
    ?>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">SWAG</div>
            <div class="card-body">
                <form action="xulydangnhap.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block"></input>
                </form>
                <div id="dntb" >Đăng nhập thất bại</div>
                <div id="dnbk" >Tài khoản đã bị khóa</div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
</body>

</html>