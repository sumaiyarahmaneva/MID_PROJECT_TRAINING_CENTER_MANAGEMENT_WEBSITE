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
	<title>EDIT STUDENT PROFILE</title>
</head>
<body>
	<fieldset>
		<p>NSS Training Center</p>
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
						<li><a href="owninformation.php">View Profile</a></li>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</td>
				<td rowspan="6">
					<fieldset>
					    <legend><b> STUDENT PROFILE</b></legend>
						<form method="POST">
							<br/>
							<table>
								<tr>
									<td width="10%">Name</td>
									<td>:</td>
									<td>
										<input type="text" name="name">
									</td>
								</tr>		
								<tr><td colspan="3"><hr/></td></tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td>
										<input type="text" name="email">
									</td>
								</tr>		
								<tr><td colspan="3"><hr/></td></tr>			
								<tr>
									<td>Gender</td>
									<td>:</td>
									<td>
										<input name="gender" type="radio" value="Male">Male
										<input name="gender" type="radio" value="Female">Female
										<input name="gender" type="radio" value="Other">Other
									</td>
								</tr>
								<tr><td colspan="3"><hr/></td></tr>
								<tr>
									<td>Date of Birth</td>
									<td>:</td>
									<td>
										<input type="text" size="2" name="day" />/
						                <input type="text" size="2" name="month" />/
						                <input type="text" size="4" name="year" />
						                <font size="2">(dd/mm/yyyy)</font>
									</td>
								</tr>
							</table>	
					        <hr/>
								<input type="submit" value="submit" name="submit">
						</form>
					</fieldset> 
				</td>
			</tr>
		</table>
	</fieldset>
</body>
<?php
	if(isset($_POST['submit']))
	{
		if(!empty($_SESSION))
		{
			$_SESSION['id']= $data['id'];
			$_SESSION['name']= $data['name'];
			$_SESSION['email']= $data['email'];
			$_SESSION['username']= $data['username'];
			$_SESSION['password'] = $data['password'];
			$_SESSION['gender'] = $data['gender'];
			$_SESSION['dob'] = $data['dob'];
			$_SESSION['usertype'] = $data['usertype'];
			$_SESSION['status']  = "set";
			echo "Profile is edited";

		}
		else
		{
			setcookie('id',$data['id'],time()+3600,'/');
			setcookie('name',$data['name'],time()+3600,'/');
			setcookie('email',md5($data['email']),time()+3600,'/');
			setcookie('username',$data['uasername'],time()+3600,'/');
			setcookie('password',$data['password'],time()+3600,'/');
			setcookie('gender',$data['gender'],time()+3600,'/');
			setcookie('dob',$data['dob'],time()+3600,'/');
			setcookie('usertype',$data['usertype'],time()+3600,'/');
			setcookie('status','set',time()+3600,'/');
			echo "Profile is edited";
		}
	}
	
?>
