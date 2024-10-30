<?php session_start()?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" /> -->

    <!-- Slick -->
    <!-- <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" /> -->

    <!-- nouislider -->
    <!-- <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" /> -->

    <!-- Font Awesome Icon -->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./fonts/fontawesome-free-5.15.1-web/css/all.min.css">
    <!-- Custom stlylesheet -->
    <!-- <link type="text/css" rel="stylesheet" href="css/style.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/admin_style.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.3-dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<?php if (!empty($_SESSION['nguoidung'])){?>
<body>
    <div class="cointainer">
        <!-- <div id="header2"> -->
        <?php require_once('giaodien/header.php'); ?>

        <!-- </div> -->
        <div id="body" class="row">
            <div id="leftmenu" class="col-2">
                <?php require_once('giaodien/leftmenu.php'); ?>
            </div>
            <div id="content" class="col-10">
                <?php require_once('giaodien/content.php'); ?>
            </div>
        </div>

        <div id="footer"></div>
    </div>
</body>
<?php }?>
    <script src="js/style.js"></script>
</html>
