<?php include"../konekcija.php";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="background:url(../images/bg.jpg);">
    <?php
        include "navigation.php";
    ?>
    <div class="container">
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
            </div><!-- end .col-lg-12 -->
        </div>  <!-- end .row -->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3 sidebar">
                    <div class="mini-submenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div><!-- end .mini-submenu -->
                    <div class="list-group">
                        <a href="../shop.php" class="list-group-item active">All Categories</a>
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
                    </div> <!-- end .list-group -->
                </div><!-- end .col-md3 -->
            <div class="col-md-9">
            <div class="col-md-12">
            <?php
            if(isset($_GET['idbrisanja']))
            {
                $idbrisanja=$_GET['idbrisanja'];
                $sql="DELETE FROM korpa WHERE id=".$idbrisanja;
                mysqli_query($conn,$sql);
            }
            if(isset($_GET['idkupovina']))
            {
                $idkupovina=$_GET['idkupovina'];
                $sql="UPDATE korpa SET kupljen=1 WHERE id=".$idkupovina;
                mysqli_query($conn,$sql);
            }
            ?>
            <blockquote>
		      <h2 class="text-center">NARUCENI PROIZVODI</h2>
            </blockquote>
            <hr>
            <?php
            $sql="SELECT suplementi.naslov,suplementi.slika, korpa.* FROM korpa INNER JOIN suplementi ON suplementi.id=korpa.idproizvoda WHERE korpa.idkupca=".$_SESSION['gost_id']." AND korpa.kupljen = 0 order by id desc";
            $rez=mysqli_query($conn,$sql);
            if( mysqli_num_rows ($rez)==0)
                echo "<p class='text-center'>Nemate ni jedan proizvod u korpi!</p><br>";
            else
            {
                while($red=mysqli_fetch_object($rez)) {
            ?>
    <div class='col-md-4 col-sm-6 hero-feature'>
        <div class='thumbnail' style="border-radius: 10px; box-shadow: 10px 10px 5px #888;">
            <img src='../images/Suplementi/<?php echo $red->slika;?>' style='height: 202px;''>
            <div class='caption' style="border-radius: 10px;">
                <h5><?php echo $red->naslov;?></h5>
                <p>
                <a href="korpa.php?idkupovina=<?php echo $red->id;?>" class="btn btn-primary">Buy now</a> <a href="korpa.php?idbrisanja=<?php echo $red->id;?>" class="btn btn-danger">Delete</a>
                </p>
            </div><!-- end .caprion -->
        </div><!-- end .thumbnail -->
    </div><!-- end .col-md-4 -->
    <?php
        }
    }
    ?>
</div><!-- end .col-md-12 -->
            <div class="col-md-12">
        <blockquote >
            <h2 class="text-center">KUPLJENI PROIZVODI</h2>
        </blockquote>
            <hr>
            <?php
                $sql="SELECT suplementi.naslov,suplementi.slika, korpa.* FROM korpa INNER JOIN suplementi ON suplementi.id=korpa.idproizvoda WHERE korpa.idkupca=".$_SESSION['gost_id']." AND korpa.kupljen = 1 order by id desc";
            $rez=mysqli_query($conn,$sql);
            if( mysqli_num_rows ($rez)==0)
                echo "<p class='text-center'>Nemate ni jedan kupljen proizvod u korpi!</p><br>";
            else
            {
                while($red=mysqli_fetch_object($rez)){
            ?>
                <div class='col-md-4 col-sm-6 hero-feature'>
                     <div class='thumbnail' style="border-radius: 15px; box-shadow: 10px 10px 5px #888;"> 
                        <img src='../images/Suplementi/<?php echo $red->slika;?>' style='height: 202px;''>
                        <div class='caption' style=" border-radius: 10px;">
                            <h5><?php echo $red->naslov;?></h5>
                        </div><!-- end .caption -->
                    </div><!-- end .thumbnail -->
                </div><!-- end .col-md-4 -->
            <?php
            }
            }
            ?>
                </div><!-- end .col-md-12 -->
    		</div>  <!-- end .col-md-9 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- end .container -->
    <hr >
    <?php
        include "footer.html";
    ?>
    </body>
</html>
