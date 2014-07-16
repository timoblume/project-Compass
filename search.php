<?php include 'core/init.php';?>
<?php $website_title = "Willkommen bei Compass!"; ?> 
<?php include 'includes/overall/header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Ergebnisse</h1>
			<?php
			if(isset($_GET['keywords'])){
				$keywords = $_GET['keywords'];

				$result = mysql_query("SELECT first_name, profile FROM users WHERE email LIKE '{$keywords}%' OR first_name LIKE '%{$keywords}%'");
				
			}
			?>

			<div class="result-count">
				Found <?php echo mysql_num_rows($result); ?> results.
			</div>
			

			<?php if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result, MYSQL_ASSOC)){?>

						<div class="result">

								
							<div class="crop">
								<a href="/lr/<?php echo $row['first_name'];?>">
			                  <?php if (empty($row['profile']) === false){ 
			                      echo '<img class="img img-responsive img-circle" src="' , $row['profile'],'" alt="',  $row['first_name'], '\'s Profile Image">';
			                    }else{
			                       echo '<img class="img img-responsive img-circle" src="images/placeholder-img.jpg" alt="', $user_data['first_name'], '\'s Profile Image">';

			                      }
			                  ?>
			                  </a>
			                </div>

					
							<a href="#"><?php echo $row['first_name'];?></a>
						</div>
					<?php }} ?>
		</div>
	</div>
</div>	

<?php include 'includes/footer.php'; ?>