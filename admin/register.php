<?php
	include"../konekcija.php";
	$conn= mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	if(!$conn){
		echo "Baza nije dostupna";
		exit ();
	}

	if(isset($_POST['tbUsername1']) and !empty($_POST['tbUsername1']) and isset($_POST['tbEmail']) and !empty($_POST['tbEmail'])   and  isset($_POST['tbPassword1']) and !empty($_POST['tbPassword1']) and isset($_POST['tbPassword2']) and !empty($_POST['tbPassword2']))
	{
		$username= $_POST['tbUsername1'];
		/*if ((strlen($username))==0){
			echo "NISTE UNELI USERNAME";
		}*/
		$result = mysqli_query($conn, "SELECT * FROM users Where username='".$username."'");
		if (mysqli_num_rows($result)!=NULL){
			header("Location: index.php?greska=3");
		}
		else 
		{
		$email=$_POST['tbEmail'];
		$password= $_POST['tbPassword1'];
		$confirmPw=$_POST['tbPassword2'];
		$q= "INSERT INTO `users` (`id`, `username`, `password`, `status`, `email`, `confirmPw`) VALUES (NULL, '$username', '$password', 'gost', '$email', '$confirmPw');";
		mysqli_query ($conn,$q);
		header("location: index.php");
		}
		if(strlen($_POST['tbUsername1'])<6 || strlen($_POST['tbPassword1'])<6 || strlen($_POST['tbPassword2'])<6 || strlen($_POST['tbEmail'])<6)
		{
		header("Location: index.php?greska=6");
		}
		if(strpos($_POST['tbUsername1'],"'") || strpos($_POST['tbPassword1'],"'") || strpos($_POST['tbPassword2'],"'") || strpos($_POST['tbEmail'],"'"))
		{
			header("Location: index.php?greska=7");
		}
		if(strpos($_POST['tbUsername1'],"!") || strpos($_POST['tbPassword1'],"!") || strpos($_POST['tbPassword2'],"!") || strpos($_POST['tbEmail'],"!"))
		{
			header("Location: index.php?greska=7");
		}
		if(strpos($_POST['tbUsername1'],"<") || strpos($_POST['tbPassword1'],"<") || strpos($_POST['tbPassword2'],"<") || strpos($_POST['tbEmail'],"<"))
		{
			header("Location: index.php?greska=7");
		}
		if(strpos($_POST['tbUsername1'],">") || strpos($_POST['tbPassword1'],">") || strpos($_POST['tbPassword2'],">") || strpos($_POST['tbEmail'],">"))
		{
			header("Location: index.php?greska=7");
		}
		if(strpos($_POST['tbUsername1']," ") || strpos($_POST['tbPassword1']," ") || strpos($_POST['tbPassword2']," ") || strpos($_POST['tbEmail']," "))
		{
			header("Location: index.php?greska=7");
		}
		if(strpos($_POST['tbUsername1'],"/") || strpos($_POST['tbPassword1'],"/") || strpos($_POST['tbPassword2'],"/") || strpos($_POST['tbEmail'],"/"))
		{
			header("Location: index.php?greska=7");
		}
	}
	else
    {
        header("Location: index.php?greska=2");
    }