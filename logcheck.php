<?php
	session_start();

	if(isset($_POST['submit']))
	{
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			echo "Empty username or password!";

		}
		else
		{
			
			$con = mysqli_connect('127.0.0.1', 'root', '', 'my data');
			$sql= mysqli_query($con, "select * from registration where username='".$_POST['username']."' and password = '".$_POST['password']."';");
			$data=mysqli_fetch_assoc($sql);
			mysqli_close($con);
			if(!empty($data))
			{
				if(isset($_POST['rememberme']))
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
					if($_COOKIE['usertype']=="Student")
					{
						header('location:student.php');
					}
					elseif ($_COOKIE['usertype']=="Admin")
					{
						header('location:admin.php');
					}
					else
					{
						header('location:trainer.php');
					}
				}
				else
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
					if($_SESSION['usertype']=="Student")
					{
						header('location:student.php');
					}
					elseif ($_SESSION['usertype']=="Admin")
					{
						header('location:admin.php');
					}
					else
					{
						header('location:trainer.php');
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