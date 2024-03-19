<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset="UTF-8">
	<title>library</title>
	<link rel="stylesheet" href="css/ccc.css">
	<link rel="stylesheet" href="css/all.css">
</head>
<body>

<h2>Library Management</h2>

 <div class="header">
  <div class="logo"><img src="lms.png" style="width:10%;height:60px"></div>
  <div class="header-right">
    <a class="active" href="admin.php">Home</a>
    <a href="issued.php">Issued Books</a>
    <a href="sti.php">Student Issued Books</a>
    <a href="ti.php">Teacher Issued Books</a>
    <a href="adb.php">Book</a>
   
  </div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->
<form class="example" action="action_page.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form> 

</div>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="aa1.jpg" style="width:100%;height:600px">
  <div class="text">Library</div>
</div>



<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="aaa5.jpg" style="width:100%;height:600px">
  <div class="text">Library</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="aaa7.jpg" style="width:100%;height:600px">
  <div class="text">Library</div>
</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>



  <div class="niche">



<form action="admin.php" method="post">
    ID : <input type="text" name = "field1" /><br/>
    Book Name : <input type="text" name = "field2" /><br/>
    Author Name: <input type="text" name = "field3" /><br/>
    Category: <input type="text" name = "field4" /><br/>
    Total No Of Book: <input type="text" name = "field5" /><br/>
    Available No of Book: <input type="text" name = "field6" /><br/>
    <input type="submit" />
</form>
</body> 
</htnl>
<?php
$username = "root";
$password = "";
$database = "libnew";
 
$mysqli = new mysqli("localhost", $username, $password, $database);
 
// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.
 
$field1 = $mysqli->real_escape_string($_POST['field1']);
$field2 = $mysqli->real_escape_string($_POST['field2']);
$field3 = $mysqli->real_escape_string($_POST['field3']);
$field4 = $mysqli->real_escape_string($_POST['field4']);
$field5 = $mysqli->real_escape_string($_POST['field5']);
$field6 = $mysqli->real_escape_string($_POST['field6']);
 
$query = "INSERT INTO book (book_id,book_name, author_name, category, total_no_of_book, available_no_of_book)
            VALUES ('{$field1}','{$field2}','{$field3}','{$field4}','{$field5}','{$field6}')";
 
if($mysqli->query($query)==true)
  {
echo "new record created successfully";}
else
{

  echo "error".$query.$mysqli->error;
}
    
$mysqli->close();
?>



  </div>



<div class="footer">

  
        <p><h4>Contact:</h4><br>
          <b>  <a href="#"><i class="fas fa-phone-alt"></i></a>Phone Number:01903203939
    <br><a href="#"><i class="fab fa-facebook"></i></a>https://www.facebook.com/library_management/
    <br><a href="#"><i class="fas fa-envelope"></i></a>info@library_management.Org
    <br><a href="#"><i class="fas fa-map-marker-alt"></i></a>Mirpur 12, Road No 1 ,Block C, 1216
    </b></p>
    <p>© All rights reserved Library_management.org</p>
  </div>

</body>
</html>