
<?php include 'db_connection.php'; ?>


<?php

if (count($_POST) > 0) {
    $id = $_POST['book_id'];
    $firstName = $_POST['available_no_of_book'];
    $departmentId = $_POST['department_id'];
    $conn = OpenCon();
   
    //$sql = "UPDATE employee SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_no = '$phone', address = '$address', age = '$age', gender = '$gender' WHERE id = '$emp_id'";
    $sql = "UPDATE book SET available_no_of_book=$firstName-1 WHERE book_id=".$id;
    if($conn->query($sql)) {
        header("Location:index.php");
    }
}
?>