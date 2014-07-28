<?php include 'core/init.php';?>
<?php $website_title = "Willkommen bei Compass!"; ?> 
<?php include 'includes/overall/header.php'; ?>
<div class="container">
	<div class="row">
		
			<h1>Leute</h1>
	
			<?php
			if(isset($_GET['keywords'])){
				$keywords = $_GET['keywords'];

				$result = mysql_query("SELECT first_name, profile FROM users WHERE email LIKE '{$keywords}%' OR first_name LIKE '%{$keywords}%'");
				
			}
			?>

			<div class="result-count">
				<?php echo mysql_num_rows($result); ?> Ergebnisse gefunden.
			</div>
			

			<?php if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result, MYSQL_ASSOC)){?>

						<div class="result">

								<div class="col-md-4">
									<div class="person">
										<div class="crop">
														<?php if (empty($row['profile']) === false){ 
						                      echo '<img class="img img-responsive img-circle" src="' , $row['profile'],'" alt="',  $row['first_name'], '\'s Profile Image">';
						                    }else{
						                       echo '<img class="img img-responsive img-circle" src="images/placeholder-img.jpg" alt="', $user_data['first_name'], '\'s Profile Image">';

						                      }
						                  ?>

										</div>
										<h4><a class="profile-link" href="/lr/<?php echo $row['first_name'];?>"><?php echo $row['first_name'];?></a></h4>
											<p>12 Abonneten</p> 
										<a href="#" class="btn btn-primary">Abonnieren</a>
									</div>
								</div>

					
							
						</div>
					<?php }} ?>
	
	</div>
	<div class="row">
	<h1>Inhalte</h1>
	

	<?php function outputting_bookmarks(){

	/* Check GET ID*/
	$keywords = $_GET['keywords'];
	global $user_data;
	$row_counter = 1;

	// bookmarks query 

	$result = mysql_query("SELECT * FROM bookmarks WHERE title LIKE '%{$keywords}%' OR description LIKE '%{$keywords}%' OR tags LIKE '%{$keywords}%'");
	?>
	<div class="result-count">
		<?php echo mysql_num_rows($result); ?> Ergebnisse gefunden.
	</div>
	<?php
	$id = $user_data['user_id'];
	$output = "";


	$collapse_id = 0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

		
	
		$category_data = category_data($row['category'],'title','description', 'category_id', 'user_id');

		$profile_id = $category_data['user_id'];

		$profile_data = user_data($profile_id, 'first_name', 'profile');

		
		$output = $output . "<div class='col-lg-4 col-md-4 col-sm-12 bookmark " . $row['tags'] ."'>";
		$output = $output . "<div class='overlay'>" . "<a href='#' class='btn btn-primary'><i class='fa fa-paper-plane'></i></a>" . "</div>";
		$output = $output . "<div class='panel-group' id='accordion'>";
		$output = $output . "<div class='panel panel-default'>";
		$output = $output . "<div class='panel-heading'>";

		$output =  $output . "<a href='" . $row['url'] . "' class='toPage' target='_blank'>";
		$output =  $output . "<header><h4>";
		$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
		$output =  $output  . $row['title'] . "</h4></header>";

		// Get the excerpt of the describtion 

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

		$output = $output . "<footer><div class='category-link'><a href='category.php?id=" . $category_data['category_id'] . "'> In " . $category_data['title'] . "</a></div>";

 	 		$output = $output .	"<div class='pull-right crop'>";

              if (empty($user_data['profile']) === false){ 
                  $output = $output . "<img class='img img-responsive img-circle' src='" . $profile_data['profile'] . "' alt='" . $profile_data['first_name'] . "\'s Profile Image'>";
                }else{
                  $output = $output . "<img class='img img-responsive img-circle' src='images/placeholder-img.jpg' alt='" . $user_data['first_name'] . " \'s Profile Image'>";

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



echo outputting_bookmarks();


?>
</div>
<div class="row">
<h1>Nach Tags</h1>
</div>
<div class="row">

<?php function search_bookmarks(){

	/* Check GET ID*/
	$keywords = $_GET['keywords'];
	global $user_data;
	$row_counter = 1;

	// bookmarks query 

	$result = mysql_query("SELECT * FROM bookmarks WHERE tags LIKE '%{$keywords}%'");

	$id = $user_data['user_id'];
	$output = "";

	?>
	<div class="result-count">
		<?php echo mysql_num_rows($result); ?> Ergebnisse gefunden.
	</div>
	<?php


	$collapse_id = 0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

		
	
		$category_data = category_data($row['category'],'title','description', 'category_id', 'user_id');

		$profile_id = $category_data['user_id'];

		$profile_data = user_data($profile_id, 'first_name', 'profile');

		
		$output = $output . "<div class='col-lg-4 col-md-4 col-sm-12 bookmark " . $row['tags'] ."'>";
		$output = $output . "<div class='overlay'>" . "<a href='#' class='btn btn-primary'><i class='fa fa-paper-plane'></i></a>" . "</div>";
		$output = $output . "<div class='panel-group' id='accordion'>";
		$output = $output . "<div class='panel panel-default'>";
		$output = $output . "<div class='panel-heading'>";

		$output =  $output . "<a href='" . $row['url'] . "' class='toPage' target='_blank'>";
		$output =  $output . "<header><h4>";
		$output =  $output . "<img class='favicon' src='" . "http://www.google.com/s2/favicons?domain=" . $row['url'] . "'>" ;
		$output =  $output  . $row['title'] . "</h4></header>";

		// Get the excerpt of the describtion 

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

		$output = $output . "<footer><div class='category-link'><a href='category.php?id=" . $category_data['category_id'] . "'> In " . $category_data['title'] . "</a></div>";

 	 		$output = $output .	"<div class='pull-right crop'>";

              if (empty($user_data['profile']) === false){ 
                  $output = $output . "<img class='img img-responsive img-circle' src='" . $profile_data['profile'] . "' alt='" . $profile_data['first_name'] . "\'s Profile Image'>";
                }else{
                  $output = $output . "<img class='img img-responsive img-circle' src='images/placeholder-img.jpg' alt='" . $user_data['first_name'] . " \'s Profile Image'>";

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



echo search_bookmarks();


?>














</div>

</div>	

<?php include 'includes/footer.php'; ?>