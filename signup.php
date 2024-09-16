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
                echo "<p class='success' style='z-index: 3; position: fixed; background-color: #eee; width: 100%; margin:0; padding-left: 5;'> Registration successful! You can now <a href='login.php'>login</a>.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<p style=' z-index: 3; position: fixed; color: red; background-color: #eee; width: 100%; margin:0; padding-left: 5;'>Username or email already exists!</p>";
        }
    } else {
        echo "<p style='z-index: 3; background-color: #004080; color:red; margin:0; padding-left: 5;'>Passwords do not match!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>
<body>

    <div class="main-container">
        <nav class="navbar">
            <div class="logo">
                <a href="index.html"><h1>FOIS</h1></a>
            </div>
            <ul class="nav-links">
                <h1>Sign Up</h1>
            </ul>
        </nav>
    </div>

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
            <a class="newuser" href="/FOIS_PROJECT/login.php"><p>Already a user? Click here to log in</p></a>
            <input type="submit" style="margin-top: 30px; width: 200px;" value="Sign Up" class="subtn">
        </form>
    </div>
    <footer class="footer">
        <h3>Made under CRIS</h3>
    </footer>
</body>
</html>
