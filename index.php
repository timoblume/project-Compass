

<?php include 'core/init.php';?>
<?php $website_title = "Compass"; ?> 
<?php include 'includes/overall/header.php'; ?>

<?php
if (empty($_POST) === false) {
	$required_fields = array('password', 'email');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	
	if (empty($errors) === true) {
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be at least 6 characters';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required';
		}
		if (email_exists($_POST['email']) === true) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
		}
	}
}

?>

<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo 'You\'ve been registered successfully! Please check your email to activate your account.';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		$register_data = array(	
			'email' 		=> $_POST['email'],
			'password' 		=> $_POST['password'],
			'email_code'	=> md5($_POST['email'] + microtime())
		);
		
		register_user($register_data);
		echo "<script>window.top.location='index.php?success'</script>";
		header('Location: localhost:8888/lr/index.php?success', true);
		exit();
		
	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}
?>

<?php if(logged_in() != true){?>

	<?php include 'welcome.php'; ?>
	<?php include 'includes/footer.php';?>


<?php }} ?>




<?php if(logged_in()){?>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php include 'includes/widgets/category_list.php'; ?>
			</div>


			<?php function outputting_subscriber_bookmarks(){

				/* Check GET ID*/

				global $user_data;



				$id = $user_data['user_id'];

				$subscription = mysql_query("SELECT * FROM subscriptions WHERE subscriber_id = $id");
				$output = "";
				while ($rey = mysql_fetch_array($subscription, MYSQL_ASSOC)) {
						$key = $rey['subscription_id'];

						$result = mysql_query("SELECT * FROM bookmarks WHERE $key = user_id");
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


				 	 		$id = $row['user_id'];
				 	 		$profile_data = user_data($id, 'first_name', 'profile');
				 	 		$category_data = category_data($id, 'title');

							$output = $output . "<div class='col-md-3 bookmark'>";
							$output =  $output . "<header><h4>";
							$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
							$output =  $output  . $row['title'] . "</h4></header>";
							$output =  $output . "<p>" . $row['description'] . "</p>";
							$output =  $output . "<hr>";
							$output = $output . "<footer><a href='#'> In " . $category_data['title'] . "</a>";
					 	 	$output = $output .	"<div class='pull-right crop'>";


					              if (empty($profile_data['profile']) === false){ 
					                  $output = $output . "<img class='img img-responsive img-circle' src='" . $profile_data['profile'] . "' alt='" . $profile_data['first_name'] . "\'s Profile Image'>";
					                }else{
					                  $output = $output . "<img class='img img-responsive img-circle' src='images/placeholder-img.jpg' alt='" . $profile_data['first_name'] . " \'s Profile Image'>";

					                  }
					            $output = $output .	"</div>";

							$output = $output . "</footer>";               
							$output = $output . "</div>";
						}
				}
			
				return $output;
			}
			echo outputting_subscriber_bookmarks();
		?>

		</div>
	</div>


<?php include 'includes/footer.php'; ?>
<?php } ?>