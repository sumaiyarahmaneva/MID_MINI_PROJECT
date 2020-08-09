<?php
    session_start();
	if(isset($_POST['register']))
	{
		$username = $_POST['username'];
		$id = $_POST['id'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmPassword'];
		$usertype = $_POST['usertype'];
		
		if(empty($id)||empty($password)||empty($email)||empty($confirmpassword)||empty($name)||empty($usertype))
		{
			header("location:registration.html");
		}
		else{
			if($password == $confirmpassword)
			{
				$file = fopen('user.txt','a');
				fwrite($file, $username.'|'.$id.'|'.$password.'|'.$confirmPassword.'|'.$email.'|'.$usertype."/r/n");
				fclose($file);
                header("location:login.html");				
			}
			else
			{
				header("location:registration.html");
			}
		}
	}
	else
	{
		header("location:login.html");
	}
?>