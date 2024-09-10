<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6a1b9a; /* Purple background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff; /* White text color for better contrast */
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            color: #333; /* Dark text color inside the container */
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        input[type="text"], 
        input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #8e24aa; /* Purple color for the button */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #7b1fa2; /* Slightly darker purple for hover effect */
        }

        p {
            margin-top: 15px;
            text-align: center;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register-post.php" method="POST">
            <label for="name">Username:</label>
            <input type="text" id="name" name="username" placeholder="Username" required>
            
            <label for="username">Email:</label>
            <input type="text" id="username" name="email" placeholder="Email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            
            <input type="submit" value="Register">
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
