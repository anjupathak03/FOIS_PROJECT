<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password === $confirm_password) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if username or email already exists
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 0) {
            // Insert user data into the users table
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                echo "<p class='success' style='background-color: #eee; margin:0; padding-left: 5;'> Registration successful! You can now <a href='login.php'>login</a>.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<p style='background-color: #eee; margin:0; padding-left: 5;'>Username or email already exists!</p>";
        }
    } else {
        echo "<p style='background-color: #eee; color:red; margin:0; padding-left: 5;'>Passwords do not match!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <title>Sign Up</title>
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
              <div class="three">
                <a href="/demo/index.php" class="navbar">Home</a>
              </div>
              <div class="three">
                <a href="/demo/info.php" class="navbar">Info</a>
              </div>
              <div class="four">
                <a href="#" class="navbar">Contact Us</a>
              </div>
              <div class="three">
                <a href="/demo/login.php" class="navbar">Login</a>
              </div>
              <div class="lotus_icon">
                  <a href="#"><img src="images/lotusfinal.png" class="lotus" alt=""></a>
              </div>
            </div>
        </div>

    </nav>

    <div class="signupform">
        <h2>Sign Up</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" placeholder="Username" name="username" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" placeholder="Email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" placeholder="Password" name="password" required></td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Confirm Password:</label></td>
                    <td><input type="password" placeholder="Confirm Password" name="confirm_password" required></td>
                </tr>
            </table>
            <input type="submit" style="margin-top: 30px; width: 200px;" value="Sign Up">
        </form>
    </div>
</body>
</html>
