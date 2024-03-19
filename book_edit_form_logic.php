
<?php include 'session_start.php'; ?>
<?php include 'db_connection.php'; ?>



<?php

if (count($_POST) > 0) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $issue_date = $_POST['issue_date'];
    $s_id = $_POST['s_id'];
    $conn = OpenCon();
   
    //$sql = "UPDATE employee SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_no = '$phone', address = '$address', age = '$age', gender = '$gender' WHERE id = '$emp_id'";
    $sql = "UPDATE book SET available_no_of_book= available_no_of_book -1 WHERE book_name='".$book_name."';";
    if($conn->query($sql)){
         $sql = "INSERT INTO issue(issue_no,book_id,issue_date) VALUES(issue_no,'$book_id','$issue_date');";
         $sqll = "SELECT * FROM issue WHERE book_id=".$book_id." AND issue_date='".$issue_date."';";
         $result = mysqli_query($conn, $sqll);
         
         while (($row1 = mysqli_fetch_assoc($result))){
            $issue_no=$row1['issue_no'];}

         
        
        
         if($conn->query($sql)) {
             $idd=$_SESSION['login_Id'];
          //   $sql = "SELECT s_id from student where s_name='" . $_POST['username'] . "' and s_password='" . $_POST['password'] . "' limit 1";
       // $result = mysqli_query($conn,$sql);
       // $id=mysqli_fetch_assoc($result);
        //$id2=$id["s_id"];
       // echo $idd;
       // $esha=$result->fetch_assoc();
        //$stu_id
            
                $sql="INSERT INTO s_issued_book(s_id,issue_no,issue_date) VALUES('$idd','$issue_no','$issue_date');";
                if($conn->query($sql))
         {
            header("Location:book.php");

         }
        
             
            
                //$sql="INSERT INTO t_issued_book(t_id,issue_no,issue_date) VALUES('$id','$issue_no','$issue_date');";
                if($conn->query($sql))
         {
            header("Location:book.php");

         }
             }
            
      
        }
    }

            
    
    
    
   
    //$conn->query($sql);
    
   // $sql = "SELECT "
   

?>