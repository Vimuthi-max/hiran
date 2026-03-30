form.............................................................................................................



<?php
// Initialize variables
$name = $email = $website = $comment = $gender = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";

// Function to clean input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {   
            $nameErr = "Only letters and whitespace allowed";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Website (optional)
    if (!empty($_POST["website"])) {
        $website = test_input($_POST["website"]);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL";
        }
    }

    // Comment (optional)
    if (!empty($_POST["comment"])) {
        $comment = test_input($_POST["comment"]);
    }

    // Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
</head>
<body>

<h2>PHP Form Validation Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    Name:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;">* <?php echo $nameErr; ?></span>
    <br><br>

    E-mail:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red;">* <?php echo $emailErr; ?></span>
    <br><br>

    Website:
    <input type="text" name="website" value="<?php echo $website; ?>">
    <span style="color:red;"><?php echo $websiteErr; ?></span>
    <br><br>

    Comment:
    <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="female" <?php if ($gender=="female") echo "checked"; ?>> Female
    <input type="radio" name="gender" value="male" <?php if ($gender=="male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="other" <?php if ($gender=="other") echo "checked"; ?>> Other
    <span style="color:red;">* <?php echo $genderErr; ?></span>
    <br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>





       



form database.......................................................................................................................................................

<?php
// 1. Database ??????????? ???? ?????? ???????
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db"; // ??? ??????? Database ??? ??

// Connection ?? ??????
$conn = new mysqli($servername, $username, $password, $dbname);

// Connection ?? ???? ????? ????
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables ????? ???? Initialize ?????
$name = $email = $website = $comment = $gender = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // --- Validation ??? ????? ???? ?????? ---
    if (empty($_POST["name"])) { $nameErr = "Name is required"; $isValid = false; } 
    else { $name = test_input($_POST["name"]); }

    if (empty($_POST["email"])) { $emailErr = "Email is required"; $isValid = false; } 
    else { $email = test_input($_POST["email"]); }

    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);

    if (empty($_POST["gender"])) { $genderErr = "Gender is required"; $isValid = false; } 
    else { $gender = test_input($_POST["gender"]); }

    // 2. ???? ??????? ??? ????? Database ??? ????
    if ($isValid) {
        // SQL query ?? ?????
        $sql = "INSERT INTO users (name, email, website, comment, gender) 
                VALUES ('$name', '$email', '$website', '$comment', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data saved to Database successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close(); // Connection ?? ?????
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Registration Form with Database</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"> * <?php echo $nameErr; ?><br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>"> * <?php echo $emailErr; ?><br><br>
        Website: <input type="text" name="website" value="<?php echo $website; ?>"><br><br>
        Comment: <textarea name="comment"><?php echo $comment; ?></textarea><br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other * <?php echo $genderErr; ?><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>




-- 1. Database එක සාදා ගැනීම
CREATE DATABASE registration_db;

-- 2. සාදා ගත් Database එක තෝරා ගැනීම
USE registration_db;

-- 3. Table එක සාදා ගැනීම (ප්‍රශ්න පත්‍රයේ image_feb97e.png අනුව)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    website VARCHAR(100),
    comment TEXT,
    gender VARCHAR(10) NOT NULL
);










NIC NUmber........................................................................................................





<!DOCTYPE html>
<html>
<head>
    <title>NIC Decoder</title>
    <style>
        .box {
            border: 1px solid #5D8AA8;
            padding: 20px;
            width: 380px;
            font-family: sans-serif;
        }
        input[type="text"] {
            width: 95%;
            padding: 10px;
            font-size: 18px;
            color: #2E5BFF;
            border: 1px solid #ccc;
            margin-top: 10px;
        }
        .btn-red {
            background: #E23E3E;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-blue {
            background: #1E66FF;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .res { margin-top: 20px; font-size: 16px; }
    </style>
</head>
<body>

<div class="box">
    <form method="POST">
        NIC Number:<br>
        <input type="text" name="nic"  value="<?php echo isset($_POST['nic']) ? $_POST['nic'] : ''; ?>" required>
        <p>This is a <b>NEW</b> NIC number.</p>
        
        <button type="submit" name="ok" class="btn-red">Submit</button> 
        <button type="reset" class="btn-blue">Reset</button> 
    </form>

    <?php
    if (isset($_POST['ok'])) {
        $n = $_POST['nic'];
        
        $y = substr($n, 0, 4); 
        $d = (int)substr($n, 4, 3); 
        
        $g = "Male"; 

        if ($d > 500) { 
            $g = "Female"; 
            $d = $d - 500; 
        }

        $t = mktime(0, 0, 0, 1, $d, $y);
        $bd = date('j F Y', $t);

        echo "<div class='res'>";
        echo "🎂 " . $bd . "<br><br>"; 
        echo "♂️ " . $g; 
        echo "</div>";
    }
    ?>
</div>

</body>
</html>














romannumber....................................................................................................






<html>
<head>
    <title>convert roman to decimal</title>
</head>

<body>

<h1><strong>convert roman to decimal : </strong></h1>

<form method="post">
    Enter the roman value: 
    <input type="text" name="r" required>
    <input type="submit" name="go" value="convert">
</form>

<?php 
    if(isset($_POST['go'])){
        
        $roman = strtoupper($_POST['r']);
        
        
        $value = array('I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000);
        
        $decimale = $value[$roman[0]];
        $output = $value[$roman[0]];
        
        $i = 1;
        while($i < strlen($roman)){
            $decimale += $value[$roman[$i]];
            $output = $output . " + " . $value[$roman[$i]];
            
            
            if($value[$roman[$i]] > $value[$roman[$i-1]]) {
                $decimale = $decimale - (2 * $value[$roman[$i-1]]);
                $output = $output . " + (-2 * " . $value[$roman[$i-1]] . ")";
            }

            $i++;
        } 
        
        echo "<br>output the " . $roman . " = " . $output . " = " . $decimale;
    } 
?>

</body>
</html>
