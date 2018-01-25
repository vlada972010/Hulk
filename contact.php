<?php 
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
                <h1 class="page-header">Contact
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2828.661280717106!2d20.402154315542163!3d44.84883097909856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a65b17b627421%3A0x6d6130bffc362462!2sITAcademy!5e0!3m2!1sen!2sus!4v1497043801888" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Contact Details</h3>
                <p>
                    Cara Dusana<br>Zemun, Beograd<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: (011) 326-5485</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">hulk@gmail.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Ponedeljak - Petak: 9:00 - 19:00</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-8">
                <h3>Send us a Message</h3>
                <form name="sentMessage" id="contact" novalidate>
                            <label>Full Name:</label>
                            <input type="text" placeholder="Full Name" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
                            <label>Phone Number:</label>
                            <input type="tel" placeholder="Phone Number" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
                            <label>Email Address:</label>
                            <input type="email" placeholder="Email Address" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" placeholder="Message" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                    <div id="upozorenje"></div><br>
                    <input type="button" id="Send" name="Send" class="btn btn-primary" value="Send message">
                </form>
            </div>

        </div>
        <!-- /.row -->

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
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
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
       

        $("#Send").click(function(){
        if($("#name").val()=="" || $("#phone").val()=="" || $("#email").val()=="" || $("#message").val()=="")
        {
            $("#upozorenje").html("<font color='red'>Niste uneli sve podatke!</font>").fadeOut(2500);
            return false;
        }
        if($("#name").val().length<6 || $("#phone").val().length<9 || $("#email").val().length<6)
        {
            $("#upozorenje").html("<font color='red'>Mali broj karaktera</font>").fadeOut(2500);
            return false;
        }
        document.getElementById("contact").submit();
      });
 });
    </script>

</body>

</html>
