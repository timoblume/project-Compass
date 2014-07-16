<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>
<div class="container">
<h1>Add a Bookmark</h1>


<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo '<p class="bg-success">Bookmark successfully saved!</p>';
}

if (empty($_POST) === false && empty($errors) === true) {
			$bookmark_data = array(
				'url' 		=> $_POST['url'],
				'title' 		=> $_POST['title'],
				'description' 	=> $_POST['description'],
				'tags' 	=> $_POST['tags'],
				'user_id' => $user_data['user_id']
				);

		store_bookmark($bookmark_data);
		echo "<script>window.top.location='add_bookmark.php?success'</script>";
	
}			
?>

	<div class="row">
		<div class="col-md-3">
			<form action="" method="post" role="form">
				<div class="form-group">
					<label for="url">URL:</label>
					<input type="text" class="form-control" name="url" id="url" placeholder="http://">
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="text" class="form-control" name="description" id="description">
				</div>
				<div class="form-group">
					<label for="category">Tags</label>
					<input type="text" class="form-control" name="tags" id="tags">
				</div>
			
				<input type="submit" value="Save Bookmark" class="btn btn-default">
			</form>
		</div>
	</div>
	</div>
<?php include 'includes/footer.php'; ?>