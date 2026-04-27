<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else { 
?>


<?php include("tpl/header.html"); ?>

<?php include("tpl/footer.html"); ?>
	

<?php
}
?>
