<?php
	session_start();
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['status']))
		{
			header('location:logout.php');
		}
	}
	else
	{
		if(empty($_COOKIE['status']))
		{
			header('location:logout.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>view profile</title>
</head>
<body>
	<fieldset>
		<legend>Change Password</legend>
		<form method="post">
			Current Password<br/>
			<input type="password" name="password"><br/>
			New Password<br/>
			<input type="Password" name="newpassword"><br/>
			Retype New Password<br/>
			<input type="Password" name="renewpassword"><br/>
			<hr/>
			<input type="Submit" name="change" value="Change">
				<?php
					if(!empty($_SESSION))
					{
						if($_SESSION['usertype']=="Admin") 
						{
							echo "<a href='admin.php'>Go Home</a>";
						}
						else
						{
							echo "<a href='user.php'>Go Home</a>";						
						}
					} 
					else
					{
                        if($_COOKIE['usertype']=="Admin") 
						{
							echo "<a href='admin.php'>Go Home</a>";
						}
						else
						{
							echo "<a href='user.php'>Go Home</a>";						
						}
					}
				?>			
		</form>
	</fieldset>
</body>

<?php
	if(isset($_POST['change']))
	{
		if(!empty($_POST['password']) and !empty($_POST['newpassword']) and !empty($_POST['renewpassword']))
		{
			if(!empty($_SESSION))
			{
				if($_SESSION['password']==$_POST['password'])
				{
					if($_POST['newpassword']==$_POST['renewpassword'])
					{
						$con = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
						$query= mysqli_query($con, "update `registration` SET `password`='".$_POST['newpassword']."' WHERE id='".$_SESSION['id']."'");
						$_SESSION['password']=$_POST['newpassword'];
						mysqli_close($con);
						echo "password changed";

					}
					else
						echo "new password and retype new password is not same";

				}
				else
					echo "current password is not correct";

			}
			else
			{
				if($_COOKIE['password']==md5($_POST['password']))
				{
					if($_POST['newpassword']==$_POST['renewpassword'])
					{
						$con = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
						$query= mysqli_query($con, "update `registration` SET `password`='".$_POST['newpassword']."' WHERE id='".$_COOKIE['id']."'");
						setcookie('password',md5($_POST['password']),time()+3600,'/');
						mysqli_close($con);
						echo "password changed";
					}
					else
						echo "new password and retype new password is not same";

				}
				else
					echo "current password is not correct";
			}
		}
		else
			echo "Fill All The Info First";

	}
?>