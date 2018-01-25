<?php
session_start();
if(!isset($_SESSION['status'])||$_SESSION['status']!="Administrator"){
	header("location: index.php");
}
?>
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
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
</head>

<body >
    <?php
        include "nav.php";
    ?>

	<div class="jumbotron text-center" style="margin:197px auto;">
		<h1>Dobrodosao <?= $_SESSION['status'];?></h1>
	</div>
	<?php
	    include "../models/footer.html";
	 ?>

</body>
</html>
