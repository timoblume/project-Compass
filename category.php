

<?php include 'core/init.php';?>
<?php $website_title = "Willkommen bei Compass!"; ?> 
<?php include 'includes/overall/header.php'; ?>



<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php include 'includes/widgets/category_list.php'; ?>
			</div>

<?php function outputting_bookmarks(){

	/* Check GET ID*/

	global $user_data;

	if (isset($_GET["id"])) {
		$category_id = $_GET["id"];
	}else{
		echo "something went wrong";
	}

	$result = mysql_query("SELECT title FROM categories WHERE $category_id = category_id");
	$category_title = mysql_result($result,0);

	$result = mysql_query("SELECT * FROM bookmarks WHERE $category_id = category");

	$id = $user_data['user_id'];
	$category_data = category_data($category_id,'title','description');

	$output = "";

	$output = $output . "<h1>" . $category_data['title']  . "</h1>";
	$output = $output . "<p>" . $category_data['description'] . "</p>";

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
		
		$output = $output . "<div class='col-md-3 bookmark'>";
		$output =  $output . "<header><h4>";
		$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
		$output =  $output  . $row['title'] . "</h4></header>";
		$output =  $output . "<p>" . $row['description'] . "</p>";
		$output =  $output . "<hr>";
		$output = $output . "<footer><a href='#'> In " . $category_title . "</a>";

 	 		$output = $output .	"<div class='pull-right crop'>";

              if (empty($user_data['profile']) === false){ 
                  $output = $output . "<img class='img img-responsive img-circle' src='" . $user_data['profile'] . "' alt='" . $user_data['first_name'] . "\'s Profile Image'>";
                }else{
                  $output = $output . "<img class='img img-responsive img-circle' src='images/placeholder-img.jpg' alt='" . $user_data['first_name'] . " \'s Profile Image'>";

                  }
            $output = $output .	"</div>";

		$output = $output . "</footer>";               
		$output = $output . "</div>";
		}


	return $output;
}



echo outputting_bookmarks();


?>

			

							
	</div>
</div>



<?php include 'includes/footer.php'; ?>