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
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.js"></script>
</head>

<body>
    <?php
        include "nav.php";
    ?>

	<div class="container">
	<div class="jumbotron center">

	<?php
		$selected_id="0";
		$selected_ime="";
		$selected_slika = "";

		if(isset($_GET['cid'])){
			$q= mysqli_query($conn,"SELECT * FROM kategorija WHERE id ={$_GET['cid']} AND obrisano=0");
			$rw= mysqli_fetch_object($q);
			if($rw){
				$selected_id=$rw->id;
				$selected_ime=$rw->ime;
				$selected_slika = $rw->slika;
			}	
		}
		if(isset($_POST['btn_insert'])){
			$selected_id = mysqli_insert_id($conn);
			$selected_ime = $_POST['tb_ime'];
			if(isset($_FILES['image']))
				{
					move_uploaded_file($_FILES['image']['tmp_name'],"../images/kategorije/".$_FILES['image']['name']);
					$selected_slika=$_FILES['image']['name'];
				}
			$sql="INSERT INTO kategorija (ime , slika,obrisano)  VALUES ('{$selected_ime}','{$selected_slika}','0')";
			mysqli_query($conn,$sql);
		}
		if(isset($_POST['btn_update'])){
			$selected_ime = $_POST['tb_ime'];
			if(isset($_FILES['image']['name'])=="")
			{
				move_uploaded_file($_FILES['image']['tmp_name'],"../images/kategorije/".$_FILES['image']['name']);
	            $selected_slika=$_FILES['image']['name'];
	            $sql="UPDATE kategorija SET ime='{$selected_ime}', slika='{$selected_slika}' where id= '{$selected_id}' and obrisano=0";
			}
			else
			{
				$sql="UPDATE kategorija SET ime='{$selected_ime}' where id= '{$selected_id}' and obrisano=0";
				$selected_id = $_POST['selCategory'];   
				mysqli_query($conn,$sql);
			echo $sql;
			}
		}
		if(isset($_POST['btn_delete'])){
			$selected_ime = $_POST['tb_ime'];
			$selected_id = $_POST['selCategory'];
			$sql="UPDATE kategorija SET obrisano=1 WHERE id='{$selected_id}'";
			mysqli_query($conn,$sql);

		}


 ?>  
 <h2 class="text-center">Dodaj novu kategoriju !</h2> 
<form action="" method="post" id="kat" name="kat" enctype="multipart/form-data">

<?php 
 $q = mysqli_query($conn,"SELECT * FROM kategorija WHERE obrisano=0");
 ?>
	<select  onchange="window.location='?cid='+this.value" id="selCategory" name="selCategory">
	<option value="0">--Select category--</option>
<?php 
while($rw=mysqli_fetch_object($q)){ 
	echo "<option ".($selected_id==$rw->id?"selected":"")." value='{$rw->id}'>{$rw->ime}</option>";
}
 ?>
	</select>
	<br>
	Ime: <br>
	<input class="form-control" type="text" id="tb_ime" name="tb_ime" value="<?php echo $selected_ime;?>">
	<br><br>
	<img src="../images/kategorije/<?php echo $selected_slika;?>" height="202px">
	<br>
	<input type="file" id="image" name="image">
	<br><br>
	<div id="upozorenje" ></div><div id="upozorenje1"></div><div id="upozorenje2"></div><br><br>
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
		if($("#tb_ime").val()=="" || $("#fup_image").val()=="")
		{
			$("#upozorenje").html("<font color='red'>Morate uneti ime i izabrati sliku!</font>").fadeIn(2500);
			$("#tb_ime").css("border","solid 1px red");
			return false;
		}
		document.getElementById("kat").submit();

	});

	$("#btn_update").click(function(){
		if($("#tb_ime").val()=="" || $("#fup_image").val()=="")
		{
			$("#upozorenje1").html("<font color='red'>Morate barem nesto uneti!</font>").fadeOut(2500);
			$("#tb_ime").css("border","solid 1px red");
			return false;
		}
		document.getElementById("kat").submit();

	});
	
	$("#btn_delete").click(function(){
		if($("#tb_ime").val()==""){
			$("#upozorenje2").html("<font color='red'>Niste izabrali kategoriju!!</font>").fadeOut(2500);
			return false;
		}else
		{
			$("#upozorenje2").html("<font color='green'>Uspesno ste obrisali kategoriju!</font>").fadeOut(2500);
		}
			document.getElementById("kat").submit();
	});
});
</script>