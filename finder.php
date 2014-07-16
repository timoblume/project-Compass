

<?php include 'core/init.php';?>
<?php $website_title = "Willkommen bei Compass!"; ?> 
<?php include 'includes/overall/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Leute finden </h1>
			<p>Suche nach der Emailadresse oder dem Nutzernamen</p>

			<form action="search.php" method="get" role="form">
				<div class="form-group">
					<label for="exampleInputSearchEmail">Email oder Nutzername</label>
					<input type="text" class="form-control" name="keywords" autocomplete="off" id="exampleInputSearchEmail" placeholder="email oder Nutzername">
				</div>
				
				<input type="submit" class="btn btn-default" value="Search">
			</form>

		</div>

	</div>
</div>

<?php include 'includes/footer.php'; ?>