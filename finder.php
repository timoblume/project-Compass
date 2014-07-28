

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

         	<div class="col-md-6">
				<h1>Leute einladen</h1>

				<form action="" method="post" role="form">
					<div class="form-group">
						<label for="email">E-Mail des Freundes</label>
						<input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-Mail">
					</div>

					<div class="form-group">
						<label for="nachricht">Deine Nachricht</label>
						<textarea class="form-control" name="nachricht" id="nachricht" rows="3" placeholder="Hallo! Schau dir mal Compass an:)"></textarea>
					</div>
					<input type="submit" class="btn btn-primary" value="Einladen">
				</form>
			</div>

			<div class="col-md-6">
				<h1>Leute finden </h1>

				<form action="search.php" method="get" role="form">
					<div class="form-group">
						<label for="exampleInputSearchEmail">Email oder Nutzername</label>
						<input type="text" class="form-control" name="keywords" autocomplete="off" id="exampleInputSearchEmail" placeholder="email oder Nutzername">
					</div>
					
					<input type="submit" class="btn btn-primary" value="Search">
				</form>

			</div>
		</div>
			<div class="row">
				<h1>Diese Leute sind beliebt auf Compass</h1>
				<div class="col-md-4">
					<div class="person">
						<div class="crop">
							<img src="images/placeholder-img.jpg" class="img-circle">

						</div>
						<h4>Max Mustermann</h4>
							<p>124 Abonneten</p> 
						<a href="#" class="btn btn-primary">Abonnieren</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="person">
						<div class="crop">
							<img src="images/placeholder-img.jpg" class="img-circle">

						</div>
						<h4>Max Mustermann</h4>
							<p>124 Abonneten</p>
							<a href="#" class="btn btn-primary">Abonnieren</a> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="person">
						<div class="crop">
							<img src="images/placeholder-img.jpg" class="img-circle">

						</div>
						<h4>Max Mustermann</h4>
							<p>124 Abonneten</p> 
							<a href="#" class="btn btn-primary">Abonnieren</a>
					</div>
				</div>
			
			</div>
		
		
			
		</div>
	</div> <!-- End of content wrapper-->
</div> <!-- End of Wrapper-->

<?php include 'includes/footer.php'; ?>