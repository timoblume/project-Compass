<?php
include 'core/init.php';
logged_in_redirect();
if (empty($_POST) === false) {
	$email = $_POST['email'];
	$password = $_POST['password'];


	if (empty($email) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
	} else if (email_exists($email) === false) {
		$errors[] = 'We can\'t find that username. Have you registered?';
	} else if (email_active($email) === false) {
		$errors[] = 'You haven\'t activated your account!';
	} else {
		
		if (strlen($password) > 32) {
			$errors[] = 'Password too long';
		}
		
		$login = login($email, $password);
		if ($login === false) {
			$errors[] = 'That username/password combination is incorrect';
		} else {
			$_SESSION['user_id'] = $login;
			header('Location: index.php');
			exit();
		}
	}
} else {
	$errors[] = 'No data received';
}
include 'includes/overall/header.php';
if (empty($errors) === false) {
?>
	<h2>We tried to log you in, but...</h2>
<?php
	echo output_errors($errors);
}
include 'includes/footer.php';
?>