<?php
include 'core/init.php';

if (logged_in()){
	echo 'logged-in';
}else{
	echo 'nope';
}

?>