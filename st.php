<!DOCTYPE HTML>
<html>

<head>

    <style>
        .error {
            color: #FF0000;
        }
    </style>

</head>

<body>

    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully" . '<br><br>';

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $ageErr = $weightErr = $addressErr = $mobileErr = $bloodgroupErr = "";
    $name = $email = $gender = $weight = $age = $address = $mobile = $bloodgroup = "";
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
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
            $flag = 0;
        } else {
            $age = test_input($_POST["age"]);
            // check if age only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $age)) {
                $ageErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["weight"])) {
            $weightErr = "Weight is required";
            $flag = 0;
        } else {
            $weight = test_input($_POST["weight"]);
            // check if weight only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $weight)) {
                $weightErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile No. is required";
            $flag = 0;
        } else {
            $mobile = test_input($_POST["mobile"]);
            // check if mobile only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $mobile)) {
                $mobileErr = "Only numbers allowed";
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

        if (empty($_POST["bloodgroup"])) {
            $bloodgroupErr = "Blood Group is required";
            $flag = 0;
        } else {
            $bloodgroup = test_input($_POST["bloodgroup"]);
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

    <h2>Donor Registration Form</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        Age: <input type="number" name="age" value="<?php echo $age; ?>">
        <span class="error">* <?php echo $ageErr; ?></span>
        <br><br>
        Weight: <input type="text" name="weight" value="<?php echo $weight; ?>">
        <span class="error">* <?php echo $weightErr; ?></span>
        <br><br>
        Blood Group: <input type="text" name="bloodgroup" value="<?php echo $bloodgroup; ?>">
        <span class="error">* <?php echo $bloodgroupErr; ?></span>
        <br><br>
        Address: <textarea name="address" rows="5" cols="40"><?php echo $address; ?></textarea>
        <span class="error">* <?php echo $addressErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Mobile No.: <input type="number" name="mobile" value="<?php echo $mobile; ?>">
        <span class="error">* <?php echo $mobileErr; ?></span>
        <br><br>


        <input type="submit" name="submit" value="Submit">
    </form>

    <?php

    /*echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $age;
echo "<br>";
echo $weight;
echo "<br>";
echo $address;
echo "<br>";
echo $mobile;
echo "<br>";
echo $bloodgroup;
echo "<br>";
*/

    if ($flag == 1) {
        $sql = "INSERT INTO donor(D_Age, D_Name, D_Gender, D_Weight, D_BloodGroup, D_Address, D_Email, D_Mobile) 
    VALUES('$age', '$name', '$gender', '$weight', '$bloodgroup', '$address', '$email', '$mobile')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    ?>

</body>

</html>