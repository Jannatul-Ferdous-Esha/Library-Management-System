

<?php include 'session_start.php'; ?>
<?php include 'db_connection.php'; ?>

<?php
 echo 'book';
$title = 'Edit';
$bookId = 0;

if (count($_GET)>0) {
    
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $bookId = (int)$_GET['id'];
        $book = getBook($bookId);
    } else {
        
        
        header("Location:book.php");
    }
}

function getBook($bookId) {
    $conn = OpenCon();
    $sql = "SELECT * FROM book WHERE book_id=" . $bookId . " LIMIT 1";
    $result = mysqli_query($conn, $sql);
    CloseCon($conn);
    $book = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    return $book;
}
?>

<html>
    <head>
        <title>Book - <?php echo $title; ?></title>
    </head>
    <body>
        <form name="book_edit" method="post" action="book_edit_form_logic.php" align="center">
            <h3 align="center">Book <?php echo $book['book_id']; ?> Edit</h3>
            <br>
            Book ID : <input type="number" name="book_id" value="<?php echo $book['book_id']; ?>"><br/>
            Book Name :<input type="text" name="book_name" value="<?php echo $book['book_name']; ?>"><br/>
            Student ID :<input type="number" name="s_id"><br/>
            Issue Date :<input type="date" name="issue_date"><br/>
            
            <input type="hidden" name="id" value="<?php echo $book['book_id']; ?>">
            <input type="submit" name="submit" value="Borrow">
            <input type="reset">
        </form>
    </body>
</html>
