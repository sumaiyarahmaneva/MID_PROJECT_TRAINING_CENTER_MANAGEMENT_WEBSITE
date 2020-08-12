<?php
	session_start();
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['status']) || $_SESSION['usertype']!="Student")
		{
			header('location:logout.php');
		}
	}
	else
	{
		if(empty($_COOKIE['status']) || $_SESSION['usertype']!="Student")
		{
			header('location:logout.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Own Information</title>
</head>
<body>
	<fieldset>
		<p>NSS Traning Center</p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'>Logged in as <a href='owninformation.php'>".$_SESSION['name']."</a>|<a href='logout.php'>Logout</a></p>";
			}
			else
				echo "<p align='right'>Logged in as <a href='owninformation.php'>".$_COOKIE['name']."</a>|<a href='logout.php'>Logout</a></p>";
		?>
	</fieldset>
	<fieldset>
		<table width="100%" border="1">
			<tr>
				<td rowspan="6" width="30%">
					Account
					<hr/>
					<ul>
						<li><a href="student.php">Student Home</a></li>
						<li><a href="editprofile.php">Edit Profile</a></li>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</td>
				<td rowspan="6">
					<fieldset>
					    <legend><b> STUDENT PROFILE</b></legend>
						<form>
							<br/>
							<table>
								<tr>
									<td width="10%">Name</td>
									<td>:</td>
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
								<tr><td colspan="3"><hr/></td></tr>
								<tr>
									<td>Email</td>
									<td>:</td>
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
								<tr><td colspan="3"><hr/></td></tr>			
								<tr>
									<td>Gender</td>
									<td>:</td>
									<td>
										<?php
											if(!empty($_SESSION))
											{
												echo $_SESSION['gender'];
											}
											else
												echo $_COOKIE['gender'];
										?>
									</td>
								</tr>
								<tr><td colspan="3"><hr/></td></tr>
								<tr>
									<td>Date of Birth</td>
									<td>:</td>
									<td>
										<?php
											if(!empty($_SESSION))
											{
												echo $_SESSION['dob'];
											}
											else
												echo $_COOKIE['dob'];
										?>
									</td>
								</tr>
							</table>	
					        <hr/>
					        <a href="editprofile.php">Edit Profile</a>	
						</form>
					</fieldset> 
				</td>
			</tr>
		</table>
	</fieldset>
</body>