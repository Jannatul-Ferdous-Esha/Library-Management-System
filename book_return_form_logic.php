
<?php include 'session_start.php'; ?>
<?php include 'db_connection.php'; ?>


<?php

if (count($_POST) > 0) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $issue_date = $_POST['issue_date'];
    $return_date = $_POST['return_date'];
    $s_id = $_POST['s_id'];
    $conn = OpenCon();
   
    //$sql = "UPDATE employee SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_no = '$phone', address = '$address', age = '$age', gender = '$gender' WHERE id = '$emp_id'";
    $sql = "UPDATE book SET available_no_of_book= available_no_of_book +1 WHERE book_name='".$book_name."';";
    if($conn->query($sql)){
         $sql = "UPDATE issue SET return_date='".$return_date."'  WHERE book_id=".$book_id. " AND issue_date='".$issue_date."';";
         if($conn->query($sql)) {
            header("Location:book.php");
    }
    }
    
   
    //$conn->query($sql);
    
   // $sql = "SELECT "
   
}
?>