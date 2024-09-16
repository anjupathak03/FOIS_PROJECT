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
            header("Location: web_reports.php");
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
    <title>Login</title>
</head>
<body">
    
  <div class="main-container">
    <nav class="navbar">
      <div class="logo">
        <a href="index.html"><h1>FOIS</h1></a>
      </div>
      <ul class="nav-links">
        <h1>Login</h1>
      </ul>
    </nav>
    </div>

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
            <a class="newuser" href="/FOIS_PROJECT/signup.php"><p>New User? Click here to sign up</p></a>
            <input type="submit" value="Login" class="lgbtn" style="margin-top: 20px; width: 200px; ">
        </form>
    </div>
    <footer class="footer">
        <h3>Made under CRIS</h3>
    </footer>
</body>
</html>
