<?php include"../konekcija.php";
    $conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
 ?>
<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HULK Suplementi</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="style.css">
     <script src="../js/jquery.js"></script>
    <!--<script src="../js/bootstrap.js"></script>-->

    <script src="../js/bootstrap.min.js"></script>
    <script src="./assets/bootstrap-validator/dist/validator.min.js"></script>

   

    
</head>

<body style="background-image:url(../images/bg.jpg);">

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse">
        <a class="navbar-brand" href="../index.php">HulkSuplementi</a>
        </div><!-- END .navbar-collapse -->
    </div>
</nav>

        

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Prijavite se</h3>
	                            		<p>Unesite username i password:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
                                    <form data-toggle="validator" role="form" id="login" name="login" action="login.php" method="post">
                                      <div class="form-group">
                                        <label for="tbUsername" class="control-label">Username</label>
                                        <input type="text" class="form-control"  id="tbUsername" name="tbUsername" required placeholder="Username">
                                      </div>

                                      <div class="form-group">
                                       <label for="tbPassword" class="control-label">Password</label>
                                        <input type="password" data-minlength="6" class="form-control" id="tbPassword" name="tbPassword" placeholder="Password" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Log in</button>
                                      </div>
                                    </form>

                                    <?php
                                        if(isset($_GET['greska']))
                                        {
                                            if($_GET['greska']==1)
                                                echo "<font color='red'>Pogrešno korisničko ime ili lozinka</font>";
                                            if($_GET['greska']==4)
                                                echo "<font color='red'>Username i Password moraju da imaju vise od 6 karaktera!</font>";
                                            if($_GET['greska']==5)
                                                echo "<font color='red'>Uneliste nedozvoljeni karakter!!</font>";
                                        }
                                    ?>
			                    </div>
		                    </div>        
                        </div> 
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Registrujte se sada</h3>
	                            		<p>Popunite sva polja da bi se registrovali:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
                                    <form data-toggle="validator" role="form" id="register" name="register" action="register.php" method="post">
                                      <div class="form-group">
                                        <label for="inputName" class="control-label">Username</label>
                                        <input type="text" class="form-control" id="tbUsername1" name="tbUsername1" placeholder="Username" required>
                                      </div>
                                    
                                      <div class="form-group">
                                        <label for="tbEmail" class="control-label">Email</label>
                                        <input type="email" class="form-control" id="tbEmail" name="tbEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email" data-error="email address nije ispravna" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group">
                                        <label for="tbPassword1" class="control-label">Password</label>
                                        <input type="password" data-minlength="6" class="form-control" id="tbPassword1" name="tbPassword1" placeholder="Password" required>
                                        <font color="#a94442">Minimum 6 karaktera</font>
                                      </div>

                                      <div class="form-group">
                                        <label for="tbPassword2" class="control-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="tbPassword2" name="tbPassword2" data-match="#tbPassword1" data-match-error="lozinke se ne podudaraju" placeholder="Confirm Password" required>
                                        <div class="help-block with-errors"></div>
                                      </div>
                                     
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Register Now</button>
                                      </div>
                                    </form>
                                    <?php
                                    if(isset($_GET['greska']))
                                    {
                                        if($_GET['greska']==2)
                                            echo "<font color='red'>Neispravni podaci,pokusajte ponovo!</font>";
                                        if($_GET['greska']==3)
                                            echo "<font color='red'>Username ili Email vec postoji!</font>";
                                        if($_GET['greska']==6)
                                            echo "<font color='red'>Podaci moraju da imaju vise od 6 karaktera!!</font>";
                                        if($_GET['greska']==7)
                                            echo "<font color='red'>Uneliste nedozvoljeni karakter!!</font>";
                                    }
                                    ?>
			                    </div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "../models/footer.html";
    ?>

       <!-- <script>
    $(document).ready(function(){
    $("#tbLogin").click(function(){
        if($("#tbUsername").val()=="" || $("#tbPassword").val()=="")
        {
            $("#upozorenje").html("<font color='red'>Niste uneli sve podatke!</font>").fadeOut(3000);;
            return false;
        }
        if($("#tbUsername").val().indexOf("=")>-1 || $("#tbPassword").val().indexOf("=")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("/")>-1 || $("#tbPassword").val().indexOf("/")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("'")>-1 || $("#tbPassword").val().indexOf("'")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("<")>-1 || $("#tbPassword").val().indexOf("<")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf(">")>-1 || $("#tbPassword").val().indexOf(">")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }if($("#tbUsername").val().indexOf("!")>-1 || $("#tbPassword").val().indexOf("!")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf(" ")>-1 || $("#tbPassword").val().indexOf(" ")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        document.getElementById("login").submit();

    });
    $("#tbRegister").click(function(){
        if($("#tbUsername1").val()=="" || $("#tbEmail").val()=="" || $("#tbPassword1").val()=="" || $("#tbPassword2").val()=="")
        {
            $("#upozorenje1").html("<font color='red'>Niste uneli sve podatke!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("=")>-1 || $("#tbEmail").val().indexOf("=")>-1 || $("#tbPassword").val().indexOf("=")>-1 || $("#tbPassword1").val().indexOf("=")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("/")>-1 || $("#tbEmail").val().indexOf("/")>-1 || $("#tbPassword").val().indexOf("/")>-1 || $("#tbPassword1").val().indexOf("/")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("'")>-1 || $("#tbEmail").val().indexOf("'")>-1 || $("#tbPassword").val().indexOf("'")>-1 || $("#tbPassword1").val().indexOf("'")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf("<")>-1 || $("#tbEmail").val().indexOf("<")>-1 || $("#tbPassword").val().indexOf("<")>-1 || $("#tbPassword1").val().indexOf("<")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf(">")>-1 || $("#tbEmail").val().indexOf(">")>-1 || $("#tbPassword").val().indexOf(">")>-1 || $("#tbPassword1").val().indexOf(">")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }if($("#tbUsername").val().indexOf("!")>-1 || $("#tbEmail").val().indexOf("!")>-1 || $("#tbPassword").val().indexOf("!")>-1 || $("#tbPassword1").val().indexOf("!")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        if($("#tbUsername").val().indexOf(" ")>-1 || $("#tbEmail").val().indexOf(" ")>-1 || $("#tbPassword").val().indexOf(" ")>-1 || $("#tbPassword1").val().indexOf(" ")>-1)
        {
            $("#upozorenje").html("<font color='red'>Uneli ste nedozvoljeni karakter!</font>").fadeOut(3000);
            return false;
        }
        document.getElementById("register").submit();

    });

});

        </script>-->
    </body>

</html>