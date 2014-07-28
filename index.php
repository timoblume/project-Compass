

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

<div id="wrapper">
    <div id="sidebar-wrapper">
		<div class="sidebar-nav">
		<div class="response">
		</div>
		
			<?php include 'includes/widgets/category_list.php'; ?>
		
		</div>
	</div>

	<div id="page-content-wrapper">
        <div class="page-content inset">
         <div class="row">
         <div class='col-lg-4 col-md-4 col-sm-12 friend-finder'>
         	<h4> Dein Newsfeed ist noch relativ leer...</h4>
         	<a href="finder.php" class="btn btn-primary">Jetzt Freunde finden <i class="fa fa-search"></i></a>
         	<a href="finder.php" class="btn btn-primary">Freunde einladen <i class="fa fa-envelope"></i></a>
         </div>

			<?php function outputting_subscriber_bookmarks(){

				/* Check GET ID*/

				global $user_data;

				$row_counter = 2;

				$id = $user_data['user_id'];

				$key = subscribtion_id_from_subscriber_id($id);
				$output = "";
						
						$result = mysql_query("SELECT * FROM bookmarks WHERE $key = user_id");
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

							$id = $row['category'];
							$ident = $row['user_id'];
				 	 		$profile_data = user_data($ident, 'first_name', 'profile', 'user_id');
				 	 		$category_data = category_data($id, 'title', 'category_id');

							$output = $output . "<div class='col-lg-4 col-md-4 col-sm-12 bookmark " . $row['tags'] ."'>";
							$output = $output . "<div class='overlay'>" . "<a href='#' class='btn btn-primary'><i class='fa fa-paper-plane'></i></a>" . "</div>";
							$output = $output . "<div class='panel-group' id='accordion'>";
							$output = $output . "<div class='panel panel-default'>";
							$output = $output . "<div class='panel-heading'>";

							$output =  $output . "<a href='" . $row['url'] . "' class='toPage' target='_blank'>";
							// jquery

							$output =  $output . "<header class='ui-widget-content draggable'><h4>";
							$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
							$output =  $output  . $row['title'] . "</h4>";
							$output =  $output . "<div class='hidden-user'>" . $profile_data['user_id'] . "</div>";
							$output =  $output  . "</header>";
							
							$describt = excerpt($row['description'], 150);

							$output =  $output . "<p class='excerpt'>" . $describt . "</p>";
							$output =  $output . "<p class='full-description hide'>" . $row['description'] . "</p>";
							$output =  $output . "</a>";
							           
							$output = $output . "</div>"; // end panel-heading

							$output =  $output .  "<div id='collapse-" . $collapse_id ."' class='panel-collapse collapse'>";
							$output =  $output . "<div class='panel-body'>";
							$output =  $output . "<div class='url-container'>" . $row['url'] . "</div>";
							$output =  $output . "<hr>";
							$output =  $output . "<div class='tags'>";

							$output =  $output . "<h4>Tags</h4>";
							// Ouputting Tags! 
							$id = $row['bookmark_id'];
									$sql = mysql_query("SELECT tags FROM bookmarks WHERE bookmark_id = $id");
									$i = 0;
									while (($tag = mysql_fetch_array($sql, MYSQL_ASSOC)) && ($i <= 4)) {

										$tag = trim($tag['tags']);
										$exploded = explode(' ', $tag);
										foreach($exploded as $value){
											$output = $output . "<p class='tag-no-filter'>" . $value . "</p>";

											$i++;
										}
										
									}
							
							$output =  $output . "</div>";
							
							$output =  $output . "</div>"; // end panel-body
							$output =  $output . "</div>"; // end panel-collapse in
							$output =  $output . "</div>"; // end panel panel-default
							$output =  $output . "</div>"; // end panel-group
							$output =  $output . "<a data-toggle='collapse' data-parent='#accordion' href='#collapse-" . $collapse_id ."'>";
							$output =  $output . "<span class='glyphicon glyphicon-chevron-down pull-right bookmark-expand'></span>";
							$output =  $output . "</a>";
							$output =  $output . "<hr>";
							$output = $output .  "<footer><div class='category-link'><a href='category.php?id=" . $category_data['category_id'] . "'> In " . $category_data['title'] . "</a></div>";

					 	 		$output = $output .	"<div class='pull-right crop'>";

					             if (empty($profile_data['profile']) === false){ 
					                  $output = $output . "<img class='img img-responsive img-circle' src='" . $profile_data['profile'] . "' alt='" . $profile_data['first_name'] . "\'s Profile Image'>";
					                }else{
					                  $output = $output . "<img class='img img-responsive img-circle' src='images/placeholder-img.jpg' alt='" . $profile_data['first_name'] . " \'s Profile Image'>";

					                  }
					            $output = $output .	"</div>"; // end crop
							$output = $output . "</footer>"; // end footer 
							$output =  $output . "</div>"; // end bookmark

							$collapse_id++;

							if($row_counter % 3 == 0){
								$output =  $output . "</div>";
								$output = $output . "<div class='row'>";
							}
							$row_counter++;

				 	 		
						}
				
			
				return $output;
			}
			echo outputting_subscriber_bookmarks();





							

							$output = $output . "<div class='col-md-3 bookmark'>";
							$output =  $output . "<header class='ui-widget-content dragthis'><h4>";
							$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
							$output =  $output  . $row['title'] . "</h4></header>";
							$output =  $output . "<p>" . $row['description'] . "</p>";
							$output =  $output . "<hr>";
							
					 	 	$output = $output .	"<div class='pull-right crop'>";


					              
					            $output = $output .	"</div>";

							$output = $output . "</footer>";               
							$output = $output . "</div>";
		?>

	</div>
</div>
</div>
</div> <!--page Content wrapper -->
</div>



<?php include 'includes/footer.php'; ?>
<?php } ?>