<!DOCTYPE HTML>
<html>

<head>

<meta charset="UTF-8">

  <title>library</title>
<link rel="stylesheet" href="css/ccc.css">
  <link rel="stylesheet" href="css/all.css">
</head>

<body>

    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully" . '<br><br>';

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $deptErr = $passwordErr = $addressErr = $mobileErr = $occupationErr = "";
    $name = $email = $gender = $password = $dept = $address = $mobile = $occupation = "";
    $flag = 1;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $flag = 0;
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $flag = 0;
            }
        }

      if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $flag = 0;
        } else {
            $gender = test_input($_POST["gender"]);
        }


 if (empty($_POST["address"])) {
            $addressErr = "Address is required";
            $flag = 0;
        } else {
            $address = test_input($_POST["address"]);
        }

       

        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile No. is required";
            $flag = 0;
        } else {
            $mobile = test_input($_POST["mobile"]);
            // check if mobile only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $mobile)) {
                $mobileErr = "Only numbers allowed";
                $flag = 0;
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $flag = 0;
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $flag = 0;
            }
        }

        

       

        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
            $flag = 0;
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["occupation"])) {
            $occupationErr = "Occupation is required";
            $flag = 0;
        } else {
            $occupation = test_input($_POST["occupation"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
<h2>Library Management</h2>

 <div class="header">
  <a href="#default" class="logo">Library</a>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->


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

    <h2> Registration Form</h2>
    <p><span class="error">* required field</span></p>
    <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="row">
      <div class="col-25">
        <label for="fname">Name </label></div>
         <div class="col-75"><input type="text" name="name" placeholder="Your name.." value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br></div></div>
           <div class="row">
      <div class="col-25">
        <label for="country">Gender </label>
      </div>
      <div class="col-75">
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
          </div>
          </div>



           
          <div class="row">
      <div class="col-25">
        <label for="lname">Address :</label>
      </div>
      <div class="col-75">
        <textarea  type="text" name="address" placeholder="Your Address.."rows="5" cols="40" value="<?php echo $address; ?>"></textarea>
        <span class="error">* <?php echo $addressErr; ?></span>
        <br><br></div></div>
 <div class="row">
      <div class="col-25">
        <label for="lname">Mobile no :</label>
      </div>
      <div class="col-75">
        <input type="text" name="mobile" placeholder="Your Mobile No. .."value="<?php echo $mobile; ?>">
        <span class="error">* <?php echo $mobileErr; ?></span>
        <br><br></div></div>



          <div class="row">
      <div class="col-25">
        <label for="lname">E-mail :</label>
      </div>
      <div class="col-75">
        <input type="text" name="email" placeholder="Your E-mail.." value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br></div></div>

<div class="row">
      <div class="col-25">
        <label for="password">Password :</label>
      </div>
      <div class="col-75">
        <input type="password" name="password" placeholder="Your Password.."value="<?php echo $password; ?>">
        <span class="error">* <?php echo $passwordErr; ?></span>
        <br><br></div></div>

         

         <div class="row">
      <div class="col-25">
        <label for="country">Occupation</label>
      </div>
      <div class="col-75">
        <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation == "teacher") echo "checked"; ?> value="teacher">Teacher
        <input type="radio" name="occupation" <?php if (isset($occupation) && $gender == "student") echo "checked"; ?> value="student">Student
        
        <span class="error">* <?php echo $occupationErr; ?></span>
        <br><br>
          </div>
          </div>


        <div class="row">
        <input type="submit" name="submit" value="Submit">
      </div>
    </form>
  </div>




   <?php

   echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $gender;
echo "<br>";
echo $address;
echo "<br>";
echo $mobile;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $occupation;
echo "<br>";





    if ($flag == 1) {
      if($occupation=='teacher')
      {
        $sql = "INSERT INTO teacher(t_id,t_name, t_gender, t_address,  t_phone_no,t_email_id,t_password) 
        VALUES(t_id,'$name', '$gender','$address', '$mobile', '$email','$password')";

      }
      else if($occupation=='student')
      {
        $sql = "INSERT INTO student(s_id,s_name, s_gender, s_address,  s_phone_no,s_email_id,s_password) 
        VALUES(s_id,'$name', '$gender','$address', '$mobile', '$email','$password')";

      }
    
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        ?>
      <meta http-equiv="refresh" content="5;url=hm.php">
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    ?>
    

        
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