<?php include("header.php");
 if(isset($_SESSION['uid']))
 {
 	unset($_SESSION['uid']);
 }
?>
<?php echo $_SESSION['uid'];?>
<?php include ("footer.php");?>