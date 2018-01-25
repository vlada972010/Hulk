<?php include"konekcija.php";
$conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HULK Suplementi</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background:url(images/bg.jpg);">

    <?php
        include "models/nav.php";
    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shop
                    <small>Suplementi</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Team Members -->
        
<div class="container">
    <div class="row">
       <div class="col-sm-4 col-md-3 sidebar" >
            <div class="mini-submenu" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
        <div class="list-group" style="box-shadow: 10px 10px 5px #888;">
                <a href="shop.php" class="list-group-item active">All Categories</a>
          <?php 
              $q = mysqli_query($conn,"SELECT * FROM kategorija WHERE obrisano=0");
              while($rw=mysqli_fetch_object($q)){ 
            ?>
                <a href="shop.php?cid=<?php echo $rw->id;?>" class="list-group-item <?php if( isset($_REQUEST['cid']) && $_REQUEST['cid'] ==  $rw->id) echo 'active'; ?>">
                    <?php echo $rw->ime;?><span class="badge"><?php/* $u= mysqli_query($conn,"SELECT COUNT(*) FROM 'suplementi' WHERE kategorija='4'");mysqli_query($conn,$u);*/?></span>
                </a>
            <?php
                }
             ?>       
            </div> 
        </div>
       <div class="col-sm-10 col-md-9">
        <?php
        if (!isset($_REQUEST['cid'])) {
            $sql = mysqli_query($conn, "SELECT * FROM kategorija WHERE obrisano=0");
            while($rw=mysqli_fetch_object($sql)){ 
        ?>
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail" style="border-radius: 20px; box-shadow: 10px 10px 5px #888;">
                    <a href="shop.php?cid=<?php echo $rw->id;?>"><img src="images/kategorije/<?php echo $rw->slika; ?>" alt="" style="height: 202px;">
                        <div class="caption" style="border-radius: 15px;">
                            <h4 class="text-center"><?php echo $rw->ime; ?></h4>
                    </a>
                        </div>
                </div>
            </div>
        <?php
        } 
        }
        ?>
        <?php 
            include "models/suplementi.php";
         ?>
         </div>
    </div>
</div>
        <hr>
         
        <div class="scroll-top-wrapper ">
          <span class="scroll-top-inner">
            <i class="fa fa-2x fa-arrow-circle-up"></i>
          </span>
        </div>
    </div>
    <!-- /.container -->
    <?php
            include "models/footer.html";
       ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function(){
        $(function(){
            $(document).on( 'scroll', function(){
                if ($(window).scrollTop() > 100) {
                    $('.scroll-top-wrapper').addClass('show');
                } else {
                    $('.scroll-top-wrapper').removeClass('show');
                }
            });
            $('.scroll-top-wrapper').on('click', scrollToTop);
        });
        function scrollToTop() {
            verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
            element = $('body');
            offset = element.offset();
            offsetTop = offset.top;
            $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
        }
        });

    </script>
</body>
</html>
