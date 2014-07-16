
<?php include 'core/init.php';?>
<?php $website_title = "Kategorie hinzufügen"; ?> 
<?php include 'includes/overall/header.php'; ?>


<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo '<p class="bg-success">Bookmark successfully saved!</p>';
}

if (empty($_POST) === false && empty($errors) === true) {
			$category_data = array(
				'title' 		=> $_POST['title'],
				'description' 	=> $_POST['description'],
				'user_id' => $user_data['user_id']
				);

		store_category($category_data);
		echo "<script>window.top.location='add_category.php?success'</script>";
	
}			
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include 'includes/widgets/category_list.php'; ?>
		</div>
		<div class="col-md-6">

			<h1> Add Category </h1>

			<form action="" method="post" role="form">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="text" class="form-control" name="description" id="description">
				</div>
				<input type="submit" value="Kategorie hinzufügen" class="btn btn-primary">
			</form>

		</div>

	</div>
</div>


<?php include 'includes/footer.php';?>