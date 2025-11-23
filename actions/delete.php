<?php
	$id=$_GET['id'];
	include('../config/conn.php');
	mysqli_query($conn,"delete from table1 where residentno='$id'");
	header('location:../views/tabledata.php');
?>