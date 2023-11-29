<?php

class LoginUser
{
    private $username;
    private $password;
    public $error;
    public $success;
    private $storage = "data.json";
    private $stored_users;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->login();
    }

    private function login()
    {
        foreach ($this->stored_users as $user) {
            if ($user['username'] == $this->username) {
                if (password_verify($this->password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $this->username;
                    header("location: dashboard.php");
                    exit();
                }
            }
        }
        return $this->error = "Wrong username or password.";
    }
}

if (isset($_POST['login'])) {
    new LoginUser($_POST['username'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #141414;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            height: 350px;
            margin: 0 auto;
            background-color: bisque;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }

        .register-button {
            background-color: #337ab7;
            margin-top: 10px;
        }

        .register-button:hover {
            background-color: #286090;
        }

        #success {
            color: green;
        }

        #error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST" autocomplete="off">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login" name="login">
            <input type="button" class="register-button" value="Register" onclick="location.href='register.php'">

            <p class="error"><?php echo @$user->error; ?></p>
            <p class="success"><?php echo @$user->success; ?></p>
        </form>
    </div>
</body>

</html>