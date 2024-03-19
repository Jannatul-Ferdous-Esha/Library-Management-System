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
  <a href="#default" class="logo">Library</a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <a class="active" href="book.php">Books</a>
    <a href="category.php">Catagories</a>
    <a href="author.php">Author</a>
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
</script>
 <?php
 session_start();
   include 'db_connection.php';
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
    <th>Issue</th>
    <th>Return</th>

  </tr>


            
 
    

      <tr> <?php while (($row1 = mysqli_fetch_assoc($result))) {?>
                    <td><?php echo $row1["book_id"] . "<br>"; ?></td>
                    <td><?php echo $row1["book_name"] . "<br>"; ?></td>
                    <td><?php echo $row1["author_name"] . "<br>"; ?></td>
                    
                   
                    <td><?php echo $row1["catagory"] . "<br>"; ?></td>
                    <td><?php echo $row1["total_no_of_book"] . "<br>"; ?></td>
                    <td><?php echo $row1["available_no_of_book"] . "<br>"; ?></td>
                    <td>
                        <a href="book_edit_form.php?action=edit&id=<?php echo $row1['book_id']; ?>">Issue</a>
                    </td>
                    <td>
                        <a href="book_return_form.php?action=edit&id=<?php echo $row1['book_id']; ?>">Return</a>
                    </td>

                </tr>
                <?php 
                


        }
    
    ?>
 </table>
    
    


  </div>

  <div class="footer">

  
<p><h4>Contact:</h4><br>
  <b>  <a href="#"><i class="fas fa-phone-alt"></i></a>Phone Number:01903203939
<br><a href="#"><i class="fab fa-facebook"></i></a>https://www.facebook.com/library_management/
<br>
<a href="#"><i class="fas fa-envelope"></i></a>info@library_management.Org
<br><a href="#"><i class="fas fa-map-marker-alt"></i></a>Mirpur 12, Road No 1 ,Block C, 1216</b></p>
<p>© All rights reserved Library_management.org</p>
</div>


</body>
</html>