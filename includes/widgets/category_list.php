
<?php

function get_categories($parameter){
	
	if (isset($_GET["id"])) {
		$category_id = $_GET["id"];
	}

	$ident = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM categories WHERE user_id = $ident");

	if(mysql_num_rows($result)){
		$output = "";


		$output = $output . "<ul id='category-list' class='ui-widget-header'>";

		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ 
			 
			if ($category_id == $row["category_id"]) { 
					$active = 'active';
				}else{
					$active = 'not-active';
				}

			$output = $output . '<li class="' . $active . ' ui-state-default droppable"><a href="category.php?id=' . $row['category_id'] . '">' . $row[$parameter] . '</a></li>';

		} 

		$output = $output . "<li id='add-category'><a href='add_category.php'><span class='glyphicon glyphicon-plus glyphicon-lg'></span></a></li>";

		$output = $output . "</ul>";

		
	}else{
		$output = $output . "<div class='placeholder-medium'></div><a href='add_category.php' class='btn btn-primary'>Kategorien hinzufügen</a>";
	}

	return $output;
}

echo get_categories("title"); 


?>