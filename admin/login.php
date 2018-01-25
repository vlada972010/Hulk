<?php
	include"../konekcija.php";
	$conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
		if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
			header("Location: index.php?greska=1");
		}
		if(isset($_POST['tbUsername']) || isset($_POST['tbPassword']))
		{
			header("Location: index.php?greska=1");
		}
		if(strlen($_POST['tbUsername'])<6 || strlen($_POST['tbPassword'])<6)
		{
		header("Location: index.php?greska=4");
		}
		if(empty($_POST['tbUsername']) || empty($_POST['tbPassword']))
		{
			header("Location: index.php?greska=1");
		}
		if(strpos($_POST['tbUsername'], "'")  || strpos($_POST['tbPassword'], "'"))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], "<")  || strpos($_POST['tbPassword'], "<"))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], ">")  || strpos($_POST['tbPassword'], ">"))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], " ")  || strpos($_POST['tbPassword'], " "))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], "/")  || strpos($_POST['tbPassword'], "/"))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], "=")  || strpos($_POST['tbPassword'], "="))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], '"')  || strpos($_POST['tbPassword'], '"'))
		{
			header("Location: index.php?greska=5");
		}
		if(strpos($_POST['tbUsername'], "!")  || strpos($_POST['tbPassword'], "!"))
		{
			header("Location: index.php?greska=5");
		}
		
		$username= $_POST['tbUsername'];
		$password= $_POST['tbPassword'];
		$q= "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
		$rw = mysqli_query ($conn,$q);
			if(mysqli_num_rows($rw)==1){

				$users=mysqli_fetch_object($rw);
				session_start();
					if($users->status=="gost")
					{
						$_SESSION['gost_username']=$users->username ;
						$_SESSION['gost_id'] = $users->id;
						$_SESSION['gost_password'] = $users->password;
						$_SESSION['gost_status'] = $users->status;
						header("Location: ../index.php");
					}
					else
					{
						$_SESSION['username']=$users->username ;
						$_SESSION['id'] = $users->id;
						$_SESSION['password'] = $users->password;
						$_SESSION['status'] = $users->status;
						header("Location: admin.php");
					}
			}