<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    .container {
      width: 100%;
      overflow: hidden;
    }

    .left-column {
      float: left;
      width: 30%;
      box-sizing: border-box;
      padding: 20px;
    }

    .right-column {
      float: right;
      width: 70%;
      background-image: url('login.jpg');
      background-size: cover;
      background-position: right center; /* Adjust the background-position */
      height: 100vh;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity as needed */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .signup-button {
      float: right;
      background-color: #3498db;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="left-column">
    <div class="login-container">
      <h2>Login</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>

      </form>
      <div class="register-link">
    <p>New User? <a href="register.php">Register here</a></p>
  </div>
    </div>
  </div>

  <div class="right-column"></div>
</div>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expensetrack_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
 
    $loginQuery = "SELECT * FROM users WHERE name='$username'";
    $result = $conn->query($loginQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_name'] =  $row["name"]; 
        $_SESSION['user_id'] =  $row["id"]; 
        if ($password== $row["password"]) {
            echo "<script>alert('Success Login');</script>";
            header("Location:home.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('User not found. Please check your username.');</script>";
    }
}
?>   
</body>
</html>
