<?php
include "db_connection.php";
$conn = OpenCon();
if(isset($_GET['book_id'])){
	$delete_id = $_GET['book_id'];

	$deletequery = "DELETE FROM book WHERE book_id =$delete_id";
	if($conn ->query($deletequery)){
		header('adb.php');
	}else{
		die($conn -> error);
	}
}
else{
	header('adb.php');
}

?>