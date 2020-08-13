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
	<table border="1" align="center">
		<tr>
			<td colspan="2" align="center">Profile</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>
				<?php
			    	if(!empty($_SESSION))
					{
						echo $_SESSION['id'];
					}
					else
						echo $_COOKIE['id'];
				?>
			</td>
		</tr>		
		<tr>
			<td>Name</td>
			<td>
			<?php
				if(!empty($_SESSION))
				{
					echo $_SESSION['name'];
				}
				else
					echo $_COOKIE['name'];
			?>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<?php
					if(!empty($_SESSION))
					{
						echo $_SESSION['email'];
					}
					else
						echo $_COOKIE['email'];
				?>
			</td>
		</tr>		

		<tr>
			<td>User Type</td>
			<td>
				<?php
					if(!empty($_SESSION))
					{
						echo $_SESSION['usertype'];
					}
					else
						echo $_COOKIE['usertype'];
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
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
			</td>
		</tr>							
	</table>
</body>