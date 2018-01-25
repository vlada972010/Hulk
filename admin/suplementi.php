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
    <script src="../js/jquery-3.2.1.js"></script>
</head>

<body>
    <?php
        include "nav.php";
    ?>
<div class="container">
	<div class="jumbotron">
			<h2 class="text-center">Dodajte novi artikal!</h2>
			<?php
session_start();
if(!isset($_SESSION['status'])||$_SESSION['status']!="Administrator"){
	header("location: index.php");
}
include"../konekcija.php";
$conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$selected_id="0";
$selected_naslov="";
$selected_cena="";
$selected_slika="";
$selected_kategorija="0";
$selected_akcija="0";

if(isset($_GET['sid'])){
	$sql = mysqli_query ($conn,"SELECT * FROM suplementi WHERE id = {$_GET['sid']} AND obrisano=0");
	$odg = mysqli_fetch_object ($sql);
	if($odg){

		$selected_id = $odg->id;
		$selected_naslov = $odg->naslov;
		$selected_cena = $odg->cena;
		$selected_slika = $odg->slika;
		$selected_kategorija = $odg->kategorija;
		$selected_akcija = $odg->akcija;
	}
}

if(isset($_POST['btn_insert'])){
	$selected_naslov=$_POST['tb_naslov'];
	$selected_cena=$_POST['tb_cena'];
		if(isset($_FILES['fup_image']))
		{
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/suplementi/".$_FILES['fup_image']['name']);
			$selected_slika=$_FILES['fup_image']['name'];
		}
	$selected_kategorija=$_POST['select_category'];
	$selected_akcija=$_POST['tb_akcija'];
	$sql="INSERT INTO suplementi (naslov,cena,slika,kategorija,akcija,obrisano)  VALUES ('{$selected_naslov}','{$selected_cena}','{$selected_slika}','{$selected_kategorija}','{$selected_akcija}',0)";
	mysqli_query($conn,$sql);
	$selected_id = mysqli_insert_id($conn);

}

if(isset($_POST['btn_update'])){
	$selected_id = $_POST['selSuplementi'];
	$selected_naslov =$_POST['tb_naslov'];
	$selected_cena = $_POST['tb_cena'];
	$selected_kategorija = $_POST['select_category'];
	$selected_akcija = $_POST['tb_akcija'];
	if(isset($_FILES['fup_image']['name'])=="")
		{
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/suplementi/".$_FILES['fup_image']['name']);
			$selected_slika=$_FILES['fup_image']['name'];
			$sql="UPDATE suplementi SET naslov='{$selected_naslov}',cena='{$selected_cena}',slika='{$selected_slika}',kategorija='{$selected_kategorija}',akcija='{$selected_akcija}' WHERE id= '{$selected_id}' AND obrisano='0'";
		}
		else
		{
		$sql="UPDATE suplementi SET naslov='{$selected_naslov}',cena='{$selected_cena}',kategorija='{$selected_kategorija}',akcija='{$selected_akcija}' WHERE id= '{$selected_id}' AND obrisano='0'";
		}
	

	mysqli_query($conn,$sql);
}

if(isset($_POST['btn_delete'])){
	$selected_id = $_POST['selSuplementi'];
	$selected_naslov =$_POST['tb_naslov'];
	$selected_cena = $_POST['tb_cena'];
	$selected_kategorija = $_POST['select_category'];
	$selected_akcija = $_POST['tb_akcija'];
	$sql="UPDATE suplementi SET obrisano=1 WHERE id='{$selected_id}'";
	mysqli_query($conn,$sql);
}
?>
<form action="" method="post" enctype="multipart/form-data" id="suplementiForm" name="suplementiForm">
	<select onchange="window.location='?sid='+this.value" id="selSuplementi" name="selSuplementi">
	<option value="0">--Select suplemeti--</option>
	<?php 
	 $sql = mysqli_query($conn,"SELECT * FROM suplementi WHERE obrisano=0"); 
	while($odg=mysqli_fetch_object($sql)){ 
		echo "<option ".($selected_id==$odg->id?"selected":"")." value='{$odg->id}'>{$odg->naslov}</option>";
	}
	 ?>
	</select>
<br>
	Naslov: <br>
	<input class="form-control" type="text"  id="tb_naslov" name="tb_naslov" value="<?php echo $selected_naslov;?>">
	<br>
	Cena: <br>
	<input class="form-control" type="text" id="tb_cena" name="tb_cena" value="<?php echo $selected_cena;?>">
	<br>
	Kategorija: <br>
	<select id="select_category"  name="select_category">
	<option  value="0">--Select category--</option>
	<?php 
	 $sql = mysqli_query($conn,"SELECT * FROM kategorija WHERE obrisano=0"); 
	while($odg=mysqli_fetch_object($sql)){ 
		echo "<option ".($selected_kategorija==$odg->id?"selected":"")." value='{$odg->id}'>{$odg->ime}</option>";
	}
	 ?>
	</select>
	<br>
	Akcija: <br>
	<input class="form-control" type="text" id="tb_akcija" name="tb_akcija" value="<?php echo $selected_akcija;?>">
	<br>
	<br>
	<img src="../images/suplementi/<?php echo $selected_slika;?>" height="202px">
	<br>
	<input type="file" id="fup_image" name="fup_image" >
	<br><br>
	<div id="upozorenje" style="none"></div><div id="upozorenje1"></div><div id="upozorenje2"></div>
	<br><br>
	<button id="btn_insert" name="btn_insert" class="btn btn-default">Add new</button>
	<button id="btn_update" name="btn_update" class="btn btn-default">Update</button>
	<button id="btn_delete" name="btn_delete" class="btn btn-default">Delete</button>
</form>
</div>
</div>
<hr>
	<?php
	    include "../models/footer.html";
	 ?>
</body>
</html>
<script>
$(document).ready(function(){
	$("#btn_insert").click(function(){
		if($("#tb_naslov").val()==""  || $("#tb_cena").val()=="" || $("#fup_image").val()=="" || $("#tb_akcija").val()=="" || $("#select_category").val()=="")
		{
			$("#upozorenje").html("<font color='red'>Niste uneli sve podatke!</font>").fadeIn(3000);
			return false;
		}else 
			$("#upozorenje").html("<font color='green'>Uspesno ste dodali artikal!</font>").fadeIn(3000);
		document.getElementById("suplementiForm").submit();
	});

	$("#btn_update").click(function(){
		if($("#tb_naslov").val()!=""  || $("#tb_cena").val()!="" || $("#fup_image").val()!="" || $("#tb_akcija").val()!="" || $("#select_category").val()!="")
		{
			$("#upozorenje1").html("<font color='green'>Uspesna promena!</font>").fadeIn(3000);
			
		}else{
			$("#upozorenje1").html("<font color='red'>Promenite barem jedan podatak!</font>").fadeIn(3000);
			return false;
		}
		document.getElementById("suplementiForm").submit();
	});
	$("#btn_delete").click(function(){
		if($("#tb_naslov").val()=="")
		{
			$("#upozorenje2").html("<font color='red'>Izaberite artikal!</font>").fadeIn(3000);
			return false;
		}else
		$("#upozorenje2").html("<font color='green'>Uspesno ste obrisali artikal!</font>").fadeIn(3000);
		document.getElementById("suplementiForm").submit();
	});
});
</script>