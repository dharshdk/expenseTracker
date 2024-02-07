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
      height: 100vh;
      overflow: hidden; /* Clear float */
    }

    .login-container {
      float: left;
      width: 30%;
      box-sizing: border-box;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity as needed */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .background-image {
      float: right;
      width: 50%;
      height: 100%;
      background-image: url('login.jpg'); /* Replace 'background.jpg' with your image file path */
      background-size: cover;
      background-position: center;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: calc(100% - 16px);
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

<div class="login-container">
  <h2>Login</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
  </form>
</div>

<div class="background-image"></div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You can add your login logic here
    // For simplicity, let's just show an alert with the entered credentials
    echo "<script>alert('Username: $username\\nPassword: $password');</script>";
}
?>

</body>
</html>
