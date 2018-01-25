<?php include"../konekcija.php";
$conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
session_start();

if(isset($_SESSION['gost_status'])!='gost'){
    header("location: ../admin/index.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HULK Suplementi</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <?php
        include "navigation.php";
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
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Team Members -->
        
<div class="container">
    <div class="row">
       <div class="col-sm-4 col-md-3 sidebar">
            <div class="mini-submenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
        <div class="list-group">
                <a href="shop.php" class="list-group-item active">All Categories</a>
          <?php 
              $q = mysqli_query($conn,"SELECT * FROM kategorija WHERE obrisano=0");
              while($rw=mysqli_fetch_object($q)){ 
            ?>
                <a href="../shop.php?cid=<?php echo $rw->id;?>" class="list-group-item <?php if( isset($_REQUEST['cid']) && $_REQUEST['cid'] ==  $rw->id) echo 'active'; ?>">
                    <?php echo $rw->ime;?><span class="badge">15</span>
                </a>
            <?php
                }
             ?>       
            </div> 
 </div>
            <?php
            $id = isset($_GET['cid'])&&is_numeric($_GET['cid'])?$_GET['cid']:0;
            $q = mysqli_query($conn,"SELECT * FROM suplementi WHERE id = {$id} AND obrisano=0");
            $rw=mysqli_fetch_object($q);
            if(!$rw){
                echo "Suplementi does not exist";
            } else {
            ?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../images/Suplementi/<?php echo $rw->slika;?>" alt="" style="height: 202px;">
                        <div class="caption">
                            <h5><?php echo $rw->naslov;?></h5>
                            <p><?php echo $rw->cena;?> <b>&nbspRSD</b></p>
                        </div>
                    
                    </div>
                    <form action="buy.php?cid=<?=$rw->id;?>&idproizvoda=<?= $id;?>" method="post">
                <input type="hidden" name="cid" value="<?php echo $rw->id;?>">
                <input type="number" name="kolicina" value="1"> <input type="submit" value="add">
                </form>
                <?php
                if(isset($_GET['idproizvoda'])){
                $idproizvoda = $_GET['idproizvoda'];
                $sql="INSERT into korpa (idkupca,idproizvoda) VALUES (".$_SESSION['gost_id'].",$idproizvoda)";
                mysqli_query($conn,$sql);
                }
                ?>

            </div>
            <?php } ?>


       
        </div>
        </div>
            <hr>
         <?php
            include "footer.html";
       ?>
</html>