
<?php
include 'core/init.php';


 if(isset($_POST['message'])){
		
		$user_id = $_POST['user_id']; 
		$title = $_POST['title'];
		$category = cat_id_from_title($_POST['category']);
	
		$result = mysql_query("SELECT * FROM `bookmarks` WHERE `user_id` = '$user_id' AND `title` = '$title'");
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
			
			$user = $user_data['user_id'];
			$bookmark_data = array(
				'url' 		=> $row['url'],
				'title' 		=> $row['title'],
				'description' 	=> $row['description'],
				'tags' 	=> $row['tags'],
				'category' 	=> $category,
				'user_id' => $user
			);
				store_bookmark($bookmark_data);
			
		}

		echo "saved!";

	}
?>
