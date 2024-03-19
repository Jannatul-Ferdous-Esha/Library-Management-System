<!DOCTYPE html>
<html lang=en>
<head>
  <meta charset="UTF-8">
  <title>library</title>
  <link rel="stylesheet" href="css/ccc.css">
  <link rel="stylesheet" href="css/all.css">
</head>
<body>
<?php
session_start();
include "db_connection.php";

if(isset($_POST['book'])){
	$edit_id = $_POST['book_id'];
	$name = $_POST['book_name'];
	$author = $_POST['author_name'];
	$catagory = $_POST['catagory'];
	$total = $_POST['total_no_of_book'];
	$available = $_POST['available_no_of_book'];

	$updatequery = "UPDATE book SET available_no_book= $available-1 WHERE book_id= $edit_id";
	if($conn ->query($updatequery)){
		header('book.php');
	}else{
		die($conn -> error);
	}
}

/*if(isset($_GET['book_id'])){
$edit_id = $_GET['book_id'];
$selectquery = "SELECT * FROM book WHERE book_id=$edit_id";
$runquery1 = $conn -> query($selectquery);
if($runquery1 -> num_rows >0){

while($resshow1 = $runquery1 -> fetch_assoc()) {*/

?>
<?php
   
    $conn = OpenCon();
    $borrow="";
    $f="";
     $sql = "SELECT * FROM `book`";
    $result = mysqli_query($conn, $sql);?>
   

  


       



  <div class="niche">
   
  
<table>

  <tr>
    <th>Book ID</th>
    <th>Book Name</th>
    <th>Book Author</th>
   
    <th>Book Catagory</th>
    <th> Total No of Books</th>
    <th>Available no of Books</th>
    <th>Borrow</th>

  </tr>


            
 
    

      <tr> <?php while (($row1 = mysqli_fetch_assoc($result))) {?>
                    <td><?php echo $row1["book_id"] . "<br>"; ?></td>
                    <td><?php echo $row1["book_name"] . "<br>"; ?></td>
                    <td><?php echo $row1["author_name"] . "<br>"; ?></td>
                    
                   
                    <td><?php echo $row1["category"] . "<br>"; ?></td>
                    <td><?php echo $row1["total_no_of_book"] . "<br>"; ?></td>
                    <td><?php echo $row1["available_no_of_book"] . "<br>"; ?></td>
                    <td><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                   
                    <input type="submit" class="btn btn-outline-info" name="book" value="Issue"></form></td>

                </tr>
                <?php 
                


        }
    
    ?>
 </table></form>
    
    
 </body>
 </html>
    
    