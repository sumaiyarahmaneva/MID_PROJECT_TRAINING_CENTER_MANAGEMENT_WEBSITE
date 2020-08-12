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
	<title>Class Details</title>
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
					    <legend><b>Class Details</b></legend>
						<form>
							<br/>
							<table border="1">
								<tr>
									<td width="20%">Course Name</td>
									<td width="20%">Class Teacher Name</td>
								</tr>
								<tr>
									<td width="20%">C#</td>
									<td width="20%">Dr. Adam</td>
								</tr>
								<tr>
									<td width="20%">Web Tech</td>
									<td width="20%">Md. Charle</td>
								</tr>
								<tr>
									<td width="20%">Java</td>
									<td width="20%">Mrs. Juliet</td>
								</tr>		
							</table>					
						</form>
					</fieldset> 
				</td>
			</tr>
		</table>
	</fieldset>
</body>