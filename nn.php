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
   include 'db_connection.php';
    $conn = OpenCon();
     $sql = "SELECT * FROM `book`";
    $result = mysqli_query($conn, $sql);
   
  


        while (($row1 = mysqli_fetch_assoc($result))) {
            ?>



  <div class="niche">
   
    
<table>

  <tr>
    <th>Book ID</th>
    <th>Book Name</th>
    <th>Book Author</th>
    <th>Book Edition</th>
    <th>Book Catagory</th>
    <th> Total No of Books</th>
    <th>Available no of Books</th>
  </tr>
 


    <tr>
      
                    <td><?php echo $row1["book_id"] . "<br>"; ?></td>
                    <td><?php echo $row1["book_name"] . "<br>"; ?></td>
                    <td><?php echo $row1["author_name"] . "<br>"; ?></td>
                    <td><?php echo $row1["book_edition"]  . "<br>"; ?></td>
                   
                    <td><?php echo $row1["category"] . "<br>"; ?></td>
                    <td><?php echo $row1["total_no_of_book"] . "<br>"; ?></td>
                    <td><?php echo $row1["available_no_of_book"] . "<br>"; ?></td>
                </tr>
 </table>
    <?php
        }
    
    ?>
    


  </div>

</body>
</html>