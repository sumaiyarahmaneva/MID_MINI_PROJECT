<?php
	session_start();

	if(isset($_POST['register']))
	{
		if(empty($_POST['id']) || empty($_POST['password']) || empty($_POST['confirmpassword']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['usertype']))
		{
			echo "please, fill all the  information";
		}
		else 
		{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
			$result= mysqli_query($con, "select * from registration where id ='".$_POST['id']."';");
			$data=mysqli_fetch_assoc($result);
			mysqli_close($con);
			if(empty($data['id']))
			{
				if($_POST['password'] == $_POST['confirmpassword'])
				{
					$con = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
					$result = mysqli_query($con, "insert into `registration`(`id`, `password`, `name`, `email`, `usertype`) values ('".$_POST['id']."','".$_POST['password']."','".$_POST['name']."','".$_POST['email']."','".$_POST['usertype']."');");
					mysqli_close($con);
					header('location:login.html');
				}
				else
				{
					echo "password & confirmpassword is not same";
				}
			}
			else
				echo "This id is already exist";
		}

	}
	else
	{
		header("location:registration.html");
	}

?>