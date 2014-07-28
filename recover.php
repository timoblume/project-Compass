<?php
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';
?>



	<div id="page-content-wrapper">
        <div class="page-content inset">
         <div class="row">


         
<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
	<p>Thanks, we've emailed you.</p>
<?php
} else {
	$mode_allowed = array('username', 'password');
	if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
		if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
			if (email_exists($_POST['email']) === true) {
				recover($_GET['mode'], $_POST['email']);
				header('Location: recover.php?success');
				exit();
			} else {
				echo '<p>Oops, we couldn\'t find that email address!</p>';
			}
		}
	?>
		<div class="col-md-6">
		<h1>Passwort zurücksetzen</h1>
		<form action="" method="post">
			
				<div class="form-group">
					Please enter your email address:<br>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Recover">
				</div>
			</ul>
		</form>
		</div>
		
	<?php
	} else {
		header('Location: index.php');
		exit();
	}
}
?>


</div>
</div>
</div>

<?php include 'includes/footer.php'; ?>