
	<?php
$error= "";
include("db_connection.php");
include 'session_start.php'; 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // username and password sent from form 

  $myusername=addslashes($_POST['username']); 
  $mypassword=addslashes($_POST['password']); 

  $conn = OpenCon();

  $sql="SELECT s_id FROM student WHERE s_name='$myusername' and s_password='$mypassword'";
  $result = mysqli_query($conn, $sql);

  $count= mysqli_num_rows($result);

  echo $count;

  $sqll="SELECT t_id FROM teacher WHERE t_name='$myusername' and t_password='$mypassword'";
  $result1 = mysqli_query($conn, $sqll);

  $count1= mysqli_num_rows($result1);

  echo $count1;

  $sqlll="SELECT admin_id FROM admin WHERE sadmin_name='$myusername' and sadmin_password='$mypassword'";
  $result2 = mysqli_query($conn, $sqlll);

  $count2= mysqli_num_rows($result2);

  echo $count2;
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count==1)
  {
    //$_SESSION['login_user']=$myusername;
    $_SESSION['login_Id']=$result;
    header("location: index.php");
  }
  else if($count1==1)

  {
     //$_SESSION['login_user']=$myusername;
     $_SESSION['login_Id']=$result1;
    header("location: index.php");

  }
  else if($count2==1)

  {
    // $_SESSION['login_user']=$myusername;
     $_SESSION['login_Id']=$result2;
    header("location: admin.php");

  }
  else 
  {
    $error="Your Login Name or Password is invalid";
  }
}
?>
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
    <a class="active" href="hm.php">Home</a>
    <a href="register.php">Register</a>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:70px;height: 48px;">Login</button>
  </div>
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


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username">
      

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" >
      
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <a href="register.php">Sign Up</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


	<div class="contact">
        <p><h4>Contact:</h4><br>
            <a href="#"><i class="fas fa-phone-alt"></i></a>Phone Number:01903203939
		<br><a href="#"><i class="fab fa-facebook"></i></a>https://www.facebook.com/life_source/
		<br><a href="#"><i class="fas fa-envelope"></i></a>info@life_source.Org
		<br><a href="#"><i class="fas fa-map-marker-alt"></i></a>Mirpur Cantonment, Road No 2 Section# 12, 1216
		</p>
		<p><br>© All rights reserved Life_Source.org</p>
	</div>


</body>
</html>