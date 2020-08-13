<?php
	session_start();
	session_destroy();

	setcookie('id',$_COOKIE['id'],time()-3600,'/');
	setcookie('password',md5($_COOKIE['password']),time()-3600,'/');
	setcookie('name',$_COOKIE['name'],time()-3600,'/');
	setcookie('email',$_COOKIE['email'],time()-3600,'/');
	setcookie('usertype',$_COOKIE['usertype'],time()-3600,'/');
	setcookie('status','set',time()-3600,'/');
	header('location:login.html');

?>