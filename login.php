<?php
session_start();
$host = "localhost";  // Database host
$dbUsername = "root"; // Database username
$dbPassword = "";     // Database password (leave empty for XAMPP)
$dbname = "signup_db"; // Database name

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if user exists and verify the password
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, start session
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }

    if ($result->num_rows > 0) {
        // User found, start session
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body style="background-color: #eee;">

<video autoplay muted loop id="myVideo">
    <source src="images/tr.mp4" type="video/mp4">
  </video>
    
<nav class="bg-aqua">
        <div class="main">
            <div class="one">
                <a href="#">
                    <div class="hamburger"></div>
                    <div class="hamburger"></div>
                    <div class="hamburger"></div>
                </a>
            </div>
            <div class="two">
                <a href="#" class="navbar-brand text-white"><strong>Lotus</strong></a>
            </div>
            <div class="navbarcontent">
              <div class="three" style="">
                <a href="/demo/index.php" class="navbar">Home</a>
              </div>
              <div class="three">
                <a href="/demo/info.php" class="navbar">Info</a>
              </div>
              <div class="four">
                <a href="#" class="navbar">Contact Us</a>
              </div>
              <div class="three">
                <a href="/demo/signup.php" class="navbar">Register</a>
              </div>
              <div class="lotus_icon">
                  <a href="#"><img src="images/lotusfinal.png" class="lotus" alt=""></a>
              </div>
            </div>
        </div>

    </nav>

    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <div class="loginform">
        <h2>Login Page</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username" required placeholder="Username"><br><br></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" placeholder="Password" name="password" required><br><br></td>
                </tr>
            </table>
            <input type="submit" value="Login" class="" style="margin-top: 20px; width: 200px; ">
        </form>
    </div>
</body>
</html>
