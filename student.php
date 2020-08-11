<?php
	session_start();
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['status']))
		{
			header('location:login.html');
		}
	}
	else
	{
		if(empty($_COOKIE['status']))
		{
			echo $_COOKIE['status'];
			header('location:login.html');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To Student</title>
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
				<td rowspan="6" width="20%">
					Student Account
					<hr/>
					<ul>
						<li><a href="student.php">Student Home</a></li>
						<li><a href="assignment.php">Assignment</a></li>
						<li><a href="downloadform.php">Download form</a></li>
						<li><a href="trainerdetails.php">Trainer Details</a></li>
						<li><a href="marks.php">Marks</a></li>
						<li><a href="allcourse.php">All Courses</a></li>
						<li><a href="sendmailtotrainer.php">Mail To Trainer</a></li>
						<li><a href="classroutinetime.php">Class Routine Time</a></li>
						<li><a href="notice.php">Notice</a></li>
						<li><a href="owninformation.php">Own Information</a></li>
						<li><a href="sendmsiltopeers.php">Mail To Peers</a></li>
						<li><a href="classdetails.php">Class Details</a></li>
						<li><a href="applyforjob.php">Apply For Job</a></li>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="editprofile.php">Edit Profile</a></li>
						<li><a href="logcheck.php">Go Page</a></li>
					</ul>
				</td>
				<td rowspan="6" align="center">
					<?php
						if(!empty($_SESSION))
						{
							 echo "<h1><b> Welcome ".$_SESSION['name']."</b></h1>";
						}
						else
							 echo "<h1><b> Welcome ".$_COOKIE['name']."</b></h1>";

					
					?> 
				</td>
			</tr>
		</table>
	</fieldset>
</body>