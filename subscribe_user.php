<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<?php
	if (isset($_GET["id"])) {
		$subscription = $_GET["id"];
		$subscriber = $user_data['user_id'];

		mysql_query("INSERT INTO subscriptions (subscriber_id, subscription_id) VALUES ($subscriber, $subscription)");
		echo "success!";

		
		}else{
			echo "something went wrong...";
		}
		

?>

<?php include 'includes/footer.php'; ?>