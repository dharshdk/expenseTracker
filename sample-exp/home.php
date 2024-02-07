<?php
session_start();
$username = $_SESSION['user_name']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        header {
            background-color:white;
            color: red;
            text-align: center;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            display: flex;
            max-width: 100%;
            height: 100vh;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            height: 100%;
            overflow: auto;
        }

        .right {
            flex: 1;
            background: url('savings.png') bottom left/cover no-repeat;
            background-size: 100%;
        }

        header {
            background-color: white;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        button {
            padding: 10px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
        }

        button.add-expense {
            background-color: #4caf50;
            color: #fff;
        }

        button.view-report {
            background-color: #337ab7;
            color: #fff;
        }

        .content {
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <div class="content">              
                <h1 style="color:orange ; font-family:serif">About</h1>
                <p style="color:purple ">Tracking your expenses has never been easier! Our Expense Tracker helps you manage your finances efficiently. Stay on top of your spending and make informed financial decisions.</p>
                <p style="color:purple ">Start tracking today and take control of your financial future!</p>
            </div>
            
            <div class="buttons">
                <button class="add-expense" onclick="location.href='expense.php'">Add Expense</button>
                <button class="view-report" onclick="location.href='view_report.php'">View Report</button>
            </div>
        </div>

        <div class="right">
            <header>
                <div>   
                </div>
                <div class="logout">         
                    <a href="index.php">Logout</a>
                </div>
            </header>
            <div>
            <center>
            <b><?php echo "Welcome, " . $username; ?>
            </div>
        </div>
    </div>

</body>
</html>
