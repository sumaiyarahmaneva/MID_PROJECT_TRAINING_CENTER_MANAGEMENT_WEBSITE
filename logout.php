<?php
	session_start();
	session_destroy();

	setcookie('id',$data['id'],time()-3600,'/');
	setcookie('name',$data['name'],time()-3600,'/');
	setcookie('email',md5($data['email']),time()-3600,'/');
	setcookie('username',$data['uasername'],time()-3600,'/');
	setcookie('password',$data['password'],time()-3600,'/');
	setcookie('gender',$data['gender'],time()-3600,'/');
	setcookie('dob',$data['dob'],time()-3600,'/');
	setcookie('usertype',$data['usertype'],time()-3600,'/');
	setcookie('status','set',time()-3600,'/');
	header('location:home.html');

?>