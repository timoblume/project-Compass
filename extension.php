<?php
include 'core/init.php';


$title = $_POST['category'];

$id = cat_id_from_title($title);

if (isset($_POST)){
	$bookmark_data = array(
				'url' 		=> $_POST['url'],
				'title' 		=> $_POST['title'],
				'description' 	=> $_POST['description'],
				'tags' 	=> $_POST['tags'],
				'category' 	=> $id,
				'user_id' => $user_data['user_id']
				); 

	store_bookmark($bookmark_data);

	echo "awesome";
}
?>
