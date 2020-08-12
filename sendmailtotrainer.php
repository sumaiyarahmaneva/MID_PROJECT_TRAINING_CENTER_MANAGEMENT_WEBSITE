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
	<title>Mail To Trainer</title>
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
					    <legend><b>Send Mail To Trainer</b></legend>
						<form>
							<br/>
							<table>
								<tr>
									<td width="10%">To</td>
									<td>:</td>
									<td>
										<input type="text" name="">
									</td>
								</tr>
								<tr>
									<td width="10%">Subject</td>
									<td>:</td>
									<td>
										<textarea rows="5" cols="60"></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="submit" name="sent" value="sent">
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