<?php
include 'core/init.php';
?>
		 
<?php
	$ident = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM categories WHERE user_id = $ident");
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ 
		echo "<option>" . $row['title'] . "</option>";
	}

?>
