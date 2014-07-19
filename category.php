

<?php include 'core/init.php';?>
<?php $website_title = "Willkommen bei Compass!"; ?> 
<?php include 'includes/overall/header.php'; ?>


<div id="wrapper">
    <div id="sidebar-wrapper">
		<div class="sidebar-nav">
		
				<?php include 'includes/widgets/category_list.php'; ?>
		
		</div>
	</div>

	<div id="page-content-wrapper">
        <div class="page-content inset">
         <div class="row">

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

	// bookmarks query 

	$result = mysql_query("SELECT * FROM bookmarks WHERE $category_id = category");

	$id = $user_data['user_id'];
	$category_data = category_data($category_id,'title','description');

	$output = "";

	//Title and description

	$output = $output . "<h1>" . $category_data['title']  . "</h1>";
	$output = $output . "<p>" . $category_data['description'] . "</p>";

	// Outputting the tags relative to the category

	$tags = mysql_query("SELECT tags FROM bookmarks WHERE category = $category_id");
	
		$i = 0;
		$output = $output  . "<div class='recent-tags'>";
		while (($row = mysql_fetch_array($tags, MYSQL_ASSOC)) && ($i <= 4)) {

			$tag = trim($row['tags']);
			$exploded = explode(' ', $tag);
			foreach($exploded as $value){
				
				$output = $output . "<p class='tag'>" . $value . "</p>";

				$i++;
			}
			
		}
		$output = $output  . "</div>";

	//Output all related Bookmarks
$output = $output . "<div class='positioner'>";

	$collapse_id = 0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
		$output = $output . "<div class='col-lg-4 col-md-4 col-sm-12 bookmark " . $row['tags'] ."'>";
		$output = $output . "<div class='panel-group' id='accordion'>";
		$output = $output . "<div class='panel panel-default'>";
		$output = $output . "<div class='panel-heading'>";

		
		$output =  $output . "<header><h4>";
		$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
		$output =  $output  . $row['title'] . "</h4></header>";
		$output =  $output . "<p>" . $row['description'] . "</p>";
		
		           
		$output = $output . "</div>"; // end panel-heading

		$output =  $output .  "<div id='collapse-" . $collapse_id ."' class='panel-collapse collapse'>";
		$output =  $output . "<div class='panel-body'>";
		$output =  $output . "<div class='url-container'>" . $row['url'] . "</div>";
		$output =  $output . "<div class='tags'>";

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
		$output =  $output . "<a href='#' class='btn btn-primary'>Tag hinzufügen</a>";
		$output =  $output . "</div>";
		
		$output =  $output . "</div>"; // end panel-body
		$output =  $output . "</div>"; // end panel-collapse in
		$output =  $output . "</div>"; // end panel panel-default
		$output =  $output . "</div>"; // end panel-group
		$output =  $output . "<a data-toggle='collapse' data-parent='#accordion' href='#collapse-" . $collapse_id ."'>";
		$output =  $output . "<span class='glyphicon glyphicon-chevron-down pull-right bookmark-expand'></span>";
		$output =  $output . "</a>";
		$output =  $output . "<hr>";
		$output = $output . "<footer><a href='#'> In " . $category_title . "</a>";

 	 		$output = $output .	"<div class='pull-right crop'>";

              if (empty($user_data['profile']) === false){ 
                  $output = $output . "<img class='img img-responsive img-circle' src='" . $user_data['profile'] . "' alt='" . $user_data['first_name'] . "\'s Profile Image'>";
                }else{
                  $output = $output . "<img class='img img-responsive img-circle' src='images/placeholder-img.jpg' alt='" . $user_data['first_name'] . " \'s Profile Image'>";

                  }
            $output = $output .	"</div>"; // end crop
		$output = $output . "</footer>"; // end footer 
		$output =  $output . "</div>"; // end bookmark

		$collapse_id++;
		
		}
$output =  $output . "</div>"; // end positioner

	return $output;
}



echo outputting_bookmarks();


?>

			

							
	</div>
</div>
</div>
</div> <!--page Content wrapper -->
</div>




<?php include 'includes/footer.php'; ?>