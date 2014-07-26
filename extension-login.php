<?php
include 'core/init.php';


if (isset($_POST['email']) && isset($_POST['password'])){
	$password = $_POST['password']; 
	$email = $_POST['email'];

	$login = login($email, $password);
	$_SESSION['user_id'] = $login;

	if(login($email, $password)){
		echo "login";
	}else{
		echo "not-login";
	}

}else{
	echo "something went wrong";
}
?>