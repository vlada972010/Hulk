<?php include"konekcija.php";
    $conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en"
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

<body style="background-image: url(images/bg.jpg);">
    <?php
        include "models/nav.php";
    ?>
    <div class="container">
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li style="background:#336600;" data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li style="background:#336600;" data-target="#myCarousel" data-slide-to="1"></li>
            <li style="background:#336600;" data-target="#myCarousel" data-slide-to="2"></li>
            <li style="background:#336600;" data-target="#myCarousel" data-slide-to="3"></li>
            <li style="background:#336600;" data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        
        <!-- Wrapper for slides -->
        
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/slider/slider1.jpg" class="img-responsive fill">
            </div>
            <div class="item">
                <img src="images/slider/slider2.jpg" class="img-responsive fill">
            </div>
            <div class="item">
            <img src="images/slider/slider3.jpg" class="img-responsive fill">
            </div>
            <div class="item">
            <img src="images/slider/slider4.jpg" class="img-responsive fill">
            </div>
            <div class="item">
            <img src="images/slider/slide6.jpg" class="img-responsive fill">
            </div>
        </div><!-- END slider -->
        

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header><!-- END header -->
    </div>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:#888;">
                    Welcome to Hullk Suplements
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style=" box-shadow: 10px 10px 5px  #888888;">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Contact us</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="contact.php" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style=" box-shadow: 10px 10px 5px  #888888;">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Gifts with shopping</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div><!-- END panel-body -->
                </div><!-- END panel -->
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style=" box-shadow: 10px 10px 5px  #888888;">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy for buy</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div><!-- END caption -->
            </div><!-- END thumbnail -->
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header text-center">Proizvodi na akciji</h2>
            </div>
              <?php 
                $q = mysqli_query($conn, "SELECT * FROM suplementi WHERE akcija=1");
                while($rw=mysqli_fetch_object($q))
                {
            ?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail" style="border-radius: 20px; box-shadow: 10px 10px 5px  #888888;">
                    <img src="images/Suplementi/<?= $rw->slika?>" alt="" style="
                    height: 202px;">
                    <div class="caption" style="border-radius: 15px;">
                        <h5><?= $rw->naslov?></h5>
                        <p><?= $rw->cena?><b>&nbspRSD</b></p>
                        <p>
                            <a href="models/buy.php?cid=<?php echo $rw->id;?>" class="btn btn-primary center-block">Add to card!</a>
                        </p>
                    </div><!-- END caption -->
                </div><!-- END thumbnail -->
            </div>
            <?php
                }
            ?>
        </div><!-- END.row -->

        <!-- Features Section -->        
         <div class="row">           
            <div class="col-lg-12"> 
                <h2 class="page-header">Ne cekaj priliku,stvori je.</h2>
            </div>
                <div class="col-md-6">
                    <p>Budite spremni za leto</p>
                        <ul>
                            <li><strong> Budi fit za 8 nedelja </strong></li>
                            <li>Ishrana</li> 
                            <li>Motivacija</li>
                            <li>Fitness</li>
                            <li>Zdrav dorucak i programi ishrane </li>
                            <li> Individualno pravljenje programa ishrane i treninga</li>
                        </ul>
                    <p>Uspeh se ne poklanja. On se zaradjuje u teretani,na terenu,znojem,krvlju i povremeno suzama. Nadji nacin ne izgovor! Ustani i napravi razliku.</p>
                </div>
                    <div class="col-md-6">
                        <img class="img-responsive" src="images/trener.jpg" alt="" style="border-radius: 20px; box-shadow: 10px 10px 5px  #888888;">
                    </div>
                </div> <!-- END .row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="contact.php">Send email</a>
                </div>
            </div>
        </div><!-- END .well-->

        <hr>
       <div class="scroll-top-wrapper ">
          <span class="scroll-top-inner">
            <i class="fa fa-2x fa-arrow-circle-up"></i>
          </span>
        </div>
    </div><!-- END .container -->
        <?php

            include "models/footer.html";

       ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

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
