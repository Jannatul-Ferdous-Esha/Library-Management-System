<?php
session_start();
include "db_connection.php";
$conn = OpenCon();
if(isset($_POST['update_student'])){
	$edit_id = $_POST['edit_id'];
	$name = $_POST['student_name'];
	$email = $_POST['student_email'];
	$gender = $_POST['student_gender'];
	$age = $_POST['student_age'];
	$agee=$_POST['student_agge'];

	$updatequery = "UPDATE book
	SET book_name='$name', author_name='$email', category= '$gender', total_no_of_book= $age,available_no_of_book=$agee
	WHERE book_id= $edit_id";
	if($conn ->query($updatequery)){
		header('adb.php');
	}else{
		die($conn -> error);
	}
}

if(isset($_GET['book_id'])){
$edit_id = $_GET['book_id'];
$selectquery = "SELECT book_id,book_name,author_name,category,total_no_of_book,available_no_of_book FROM book WHERE book_id=$edit_id";
$runquery1 = $conn -> query($selectquery);
if($runquery1 -> num_rows >0){

while($resshow1 = $runquery1 -> fetch_assoc()) {

?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Edit Page</title>
  </head>
  <body>
    
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Edit Form</h2>
				<!-- form start -->
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

					<input type="hidden" name="edit_id" value="<?php echo $edit_id ?>">

					<label for="student_name">Name</label><br>
					<input type="text" name="student_name" value="<?php echo $resshow1['book_name'] ?>" id="student_name"><br>

					<label for="student_email">Author Name</label><br>
					<input type="text" name="student_email" value="<?php echo $resshow1['author_name'] ?>" id="student_email"><br><br>

					<label for="student_gender">Category</label><br>
					<input type="text" name="student_gender" value="<?php echo $resshow1['category'] ?>" id="student_gender"><br><br>

					

					<label for="student_age">total no of book</label><br>
					<input type="number" name="student_age" value="<?php echo $resshow1['total_no_of_book'] ?>" id="student_age"><br><br>

					<label for="student_agge">Available no of book</label><br>
					<input type="number" name="student_agge" value="<?php echo $resshow1['available_no_of_book'] ?>" id="student_agge"><br><br>

					<input type="submit" class="btn btn-outline-info" name="update_student" value="Update">
					<br>
				</form>
				<!-- form end --> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
<?php



}
}
else{header('adb.php');}
	


}else{
	header('adb.php');
}
?>
</body>
</html>