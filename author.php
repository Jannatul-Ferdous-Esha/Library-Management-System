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
    <a href="book.php">Books</a>
    <a  href="category.php">Catagories</a>
    <a href="author.php">Author</a>
    <a herf="logout.php">LogOut</a>
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
  <div class="text">Caption Text</div>
</div>



<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="aaa5.jpg" style="width:100%;height:600px">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="aaa7.jpg" style="width:100%;height:600px">
  <div class="text">Caption Text</div>
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
<div class="niche">
  <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label for="categories">Choose Categories:</label><br><br>
            <select id="categories" name="categories">
                <option value="Humayun Ahmed">Humayun Ahmed</option>
                <option value="Muhammad Jafor Iqbal">Muhammad Jafor Iqbal</option>
                <option value="romantic">Romantic</option>
                <option value="AB+">AB+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="O-">O-</option>
                <option value="AB-">AB-</option>
            </select>

            <input type="submit" value="Go">
        </form>
    
 
<?php

session_start();
   include 'db_connection.php';
    $conn = OpenCon();
   
    $categories = "";
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categories = $_POST["categories"];
        $flag = 1;
    }

    echo $categories;
    echo "<br>";

    $sql = "SELECT * FROM `book` WHERE author_name='$categories'";
    $result = mysqli_query($conn, $sql);
    $sql = "SHOW COLUMNS FROM book";
    $result2 = mysqli_query($conn, $sql);

    if ($flag == 1) {
   
  

while (($row1 = mysqli_fetch_assoc($result))) {
            ?>
            <table>
                <tr>
                    <?php while ($row = mysqli_fetch_array($result2)) { ?>
                        <th>
                        <?php echo $row['Field'] . "<br>"; ?>
                        </th>
                    
                
                <?php
                            }
                            ?></tr>

    <tr>
      
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
 </table>
    <?php
        }
      }
    
    ?>
    

    </div>
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