<?php
	session_start();

	if(isset($_POST['Login']))
	{
		if(empty($_POST['id']) || empty($_POST['password']))
		{
			echo "Empty userid or password!";

		}
		else
		{
			
			$con = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
			$sql= mysqli_query($con, "select * from registration where id='".$_POST['id']."' and password = '".$_POST['password']."';");
			$data=mysqli_fetch_assoc($sql);
			mysqli_close($con);
			if(!empty($data))
			{
				if(isset($_POST['rememberme']))
				{
					setcookie('id',$data['id'],time()+3600,'/');
					setcookie('name',$data['name'],time()+3600,'/');
					setcookie('password',md5($data['password']),time()+3600,'/');
					setcookie('email',$data['email'],time()+3600,'/');
					setcookie('usertype',$data['usertype'],time()+3600,'/');
					setcookie('status','set',time()+3600,'/');
					if($_COOKIE['usertype']=="User")
					{
						header('location:user.php');
					}
					else
					{
						header('location:admin.php');
					}
				}
				else
				{
					$_SESSION['id']= $data['id'];
					$_SESSION['password'] = $data['password'];
					$_SESSION['name']= $data['name'];
					$_SESSION['email']= $data['email'];
					$_SESSION['usertype'] = $data['usertype'];
					$_SESSION['status']  = "set";
					if($_SESSION['usertype']=="User")
					{
						header('location:user.php');
					}
					else
					{
						header('location:admin.php');
					}
				}
			}
			else
				echo "Invalic userid Or password";
		}
	}
	else
	{
		header("location:login.html");
	}


?>