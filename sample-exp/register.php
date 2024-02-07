<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
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
      background-image: url('registerimg.jpg'); /* Replace 'background.jpg' with your image file path */
      background-size: cover;
      background-position: right center; /* Adjust the background-position */
      height: 100vh;
    }

    .register-container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 50px;
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
  </style>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expensetrack_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $checkQuery = "SELECT * FROM users WHERE name='$name' OR email='$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username or email already exists. Please choose a different one.');</script>";
    } else {
         if ($password !== $confirmPassword) {
        echo "<script>alert('Password and Confirm Password do not match. Please try again.');</script>";
    } else{
        
        $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
           
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
      }
    }
}

$conn->close();
?>

<div class="container">
<div class="left-column">
<div class="register-container">
  <h2>Register</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
   
    <button type="submit">Register</button>
    <center>
    <a href='index.php'>Sign in</a></p></center>
  </form>
</div>
</div>
 <div class="right-column"></div>
</div>
</div>

</body>
</html>
