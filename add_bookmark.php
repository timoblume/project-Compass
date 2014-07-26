<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>
<div id="wrapper">
    <div id="sidebar-wrapper">
		<div class="sidebar-nav">
		
				<?php include 'includes/widgets/category_list.php'; ?>
		
		</div>
	</div>

	<div id="page-content-wrapper">
        <div class="page-content inset">
         <div class="row">

<h1>Add a Bookmark</h1>


<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo '<p class="bg-success">Bookmark successfully saved!</p>';
}

if (empty($_POST) === false && empty($errors) === true) {

			$title = $_POST['category'];

			$id = cat_id_from_title($title);

			$bookmark_data = array(
				'url' 		=> $_POST['url'],
				'title' 		=> $_POST['title'],
				'description' 	=> $_POST['description'],
				'tags' 	=> $_POST['tags'],
				'category' 	=> $id,
				'user_id' => $user_data['user_id']
				);

		store_bookmark($bookmark_data);
		echo "<script>window.top.location='add_bookmark.php?success'</script>";
	

}			
?>


		<div class="col-md-5">
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
				<label for="select-category">Kategorie</label>
					<select class="form-control" name="category" id="select-category">

					<?php 
					$ident = $_SESSION['user_id'];
					$result = mysql_query("SELECT * FROM categories WHERE user_id = $ident");
					while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ 
						echo "<option>" . $row['title'] . "</option>";
					}
					?>
					</select>
				</div>

				<div class="form-group">
					<label for="category">Tags</label>
					<input type="text" id="tag-input" class="form-control" name="tags" id="tags">
				</div>
			
				<div class="recent-tags">
				<?php  
					output_tags($user_data['user_id']);
				 ?>
				 </div>
				
				<input type="submit" value="Save Bookmark" class="btn btn-primary">
				
			</form>
			<h1>
			<?php
			function bla($title){

			return mysql_result(mysql_query("SELECT `category_id` FROM `categories` WHERE `title` = '$title'"), 0, 'category_id');
			
			}
			bla();
			?>
			</h1>
		</div>
</div>
</div>
</div> <!--page Content wrapper -->
</div>

	</div>
<?php include 'includes/footer.php'; ?>