<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
	$username 		= $_GET['username'];
	
	if (user_exists($username) === true) {
		$user_id		= user_id_from_username($username);
		$profile_data	= user_data($user_id, 'first_name', 'last_name', 'email', 'profile');

	?>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
				
					<h1><?php echo $profile_data['first_name']; ?>'s Profile</h1>
					<p><?php echo $profile_data['email']; ?></p>
					<?php if(empty($profile_data['profile'])){ ?>
						<div class="crop">
							<img class="img img-responsive img-circle" src="images/placeholder-img.jpg">
						</div>
						<?php }else{?>
					<div class="crop">
						<img class="img img-responsive img-circle" src=" <?php echo $profile_data['profile']; ?>  ">
					</div>
					<?php } ?>
				</div>
					
				<div class="col-md-6">
					<div class="placeholder-medium"></div>
				
					<a href="subscribe_user.php?id=<?php echo $user_id ?>" class="btn ghost-subscribe pull-right">Abonnieren</a>
				
				</div>
				
			</div>
			<div class="row">

			<?php
				function get_categories(){
						/*Check for Categories*/
					global $user_id;

					$result = mysql_query("SELECT * FROM categories WHERE user_id = $user_id");

					if(mysql_num_rows($result)){
						$output = "";


				

						while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ 
							$output = $output . "<div class='col-md-3'>";
							$output = $output . "<div class='category'>";
							$output = $output . "<h1>" . $row['title'] . "</h1>";
							$output = $output . "<p>" . $row['description'] . "</p>";
							$output = $output . "<a href='#' class='btn btn-primary'>abonnieren</a>";
							$output = $output . "</div>";
							$output = $output . "</div>";
						} 
						
					}else{
						echo "something went wrong";
					}

					return $output;
				}

				echo get_categories(); 

			?>

				</div>
			</div>
		</div>
	<?php
	} else {
		echo 'Sorry, that user doesn\'t exist!';
	}
} else {
	header('Location: index.php');
	exit();
}

include 'includes/footer.php'; ?>