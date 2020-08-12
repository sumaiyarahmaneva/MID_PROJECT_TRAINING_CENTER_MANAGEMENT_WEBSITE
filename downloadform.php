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
	<title>Download</title>
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
					Student Account
					<hr/>
					<ul>
						<li><a href="student.php">Student Home</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</td>
				<td rowspan="6">
					<fieldset>
					    <legend><b>Download Forms</b></legend>
						<form>
							<br/>
							<table>
								<tr>
									<td width="20%">Form Name</td>
									<td></td>
									<td>
										Download Link
									</td>
								</tr>
								<tr>
									<td width="20%">Registration Forms</td>
									<td>:</td>
									<td>
										<a href="">Downlod From Here</a>
									</td>
								</tr>
								<tr>
									<td width="20%">Scholarship Forms</td>
									<td>:</td>
									<td>
										<a href="">Downlod From Here</a>
									</td>
								</tr>
								<tr>
									<td width="20%">TPE Forms</td>
									<td>:</td>
									<td>
										<a href="">Downlod From Here</a>
									</td>
								</tr>
							</table>		
						</form>
					</fieldset> 
				</td>
			</tr>
		</table>
	</fieldset>
</body>