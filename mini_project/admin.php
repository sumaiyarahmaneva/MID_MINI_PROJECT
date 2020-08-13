<?php
	session_start();
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['status']) || $_SESSION['usertype']!="Admin")
		{
			header('location:logout.php');
		}
	}
	else
	{
		if(empty($_COOKIE['status']) || $_SESSION['usertype']!="Admin")
		{
			header('location:logout.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin home</title>
</head>
<body>
	
	<fieldset>
		<table width="100%" border="1">
			<tr>
				<td rowspan="6" width="20%" align="center">
					<?php
						if(!empty($_SESSION))
						{
							 echo "<h1 align='Center'><b> Welcome ".$_SESSION['name']."!</b></h1>";
						}
						else
							 echo "<h1><b> Welcome ".$_COOKIE['name']."!</b></h1>";
					
					?> 
					
					<a href="viewprofile.php">Profile</a><br/>
					<a href="changepassword.php">Change Password</a><br/>
					<a href="viewuser.php">View User</a><br/>
					<a href="logout.php">Logout</a>
					
				</td>
				
			</tr>
		</table>
	</fieldset>
</body>