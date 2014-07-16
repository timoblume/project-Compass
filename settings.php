<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';


if (empty($_POST) === false) {
	$required_fields = array('first_name', 'email');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	
	if (empty($errors) === true) {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required';
		} else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
		}
	}
}

?>
<div class="container">
<h2>Hello, <?php echo $user_data['first_name']; ?>!</h2>

<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo 'Your details have been updated!';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		
		$update_data = array(
			'first_name' 	=> $_POST['first_name'],
			'last_name' 	=> $_POST['last_name'],
			'email' 		=> $_POST['email'],
			'allow_email'	=> ($_POST['allow_email'] == 'on') ? 1 : 0
		);
		
		update_user($session_user_id, $update_data);
		header('Location: settings.php?success');
		exit();
		
	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}
	?>

	<div class="row">
	<div class="col-md-6">

	<form action="" method="post" role="form">
		<div class="form-group">
			<label for="exampleInputFirstName">Vorname</label>
			<input type="text" class="form-control" name="first_name" id="exampleInputFirstName" value="<?php echo $user_data['first_name']; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputLastName">Nachname</label>
			<input type="text" class="form-control" name="last_name" id="exampleInputLastName" value="<?php echo $user_data['last_name']; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Email</label>
			<input type="text" class="form-control" name="email" id="exampleInputEmail" value="<?php echo $user_data['email']; ?>">
		</div>
		<div class="checkbox">
		<label>
			<input type="checkbox" name="allow_email" <?php if ($user_data['allow_email'] == 1) { echo 'checked="checked"'; } ?>> Would you like to receive email from us?
		</label>
		</div>
		
		<input type="submit" class="btn btn-default" value="Update">
	</form>
	</div>
	</div>



<?php
} ?>
	<div class="row">
		<div class="col-md-6">
			<div class="profile">
					<?php
					if (isset($_FILES['profile']) === true) {
						if (empty($_FILES['profile']['name']) === true) {
							echo 'Please choose a file!';
						} else {
							$allowed = array('jpg', 'jpeg', 'gif', 'png');
							
							$file_name = $_FILES['profile']['name'];
							$file_extn = strtolower(end(explode('.', $file_name)));
							$file_temp = $_FILES['profile']['tmp_name'];
							
							if (in_array($file_extn, $allowed) === true) {
								change_profile_image($session_user_id, $file_temp, $file_extn);
								
								header('Location: ' . $current_file);
								exit();
								
							} else {
								echo 'Incorrect file type. Allowed: ';
								echo implode(', ', $allowed);
							}
						}
					}
					
					if (empty($user_data['profile']) === false) {
						
						echo '<img class="img img-responsive" src="', $user_data['profile'], '" alt="', $user_data['first_name'], '\'s Profile Image">';
						 
						} ?>

					<form action="" method="post" enctype="multipart/form-data">
						<input type="file" name="profile"> <input type="submit">
					</form>
				</div>
		</div>
	</div>

</div>

<?php include 'includes/footer.php'; ?>