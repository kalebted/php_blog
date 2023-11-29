<?php

    class RegisterUser
    {
        private $username;
        private $raw_password;
        private $encrypted_password;
        public $error;
        public $success;
        private $storage = "data.json";
        private $stored_users;
        private $new_user; //array

        public function __construct($username, $password)
        {
            $this->username = htmlspecialchars(trim($username));
            $this->raw_password = htmlspecialchars(trim($password));
            $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

            $this->stored_users = json_decode(file_get_contents($this->storage), true);
            $this->new_user = [
                "username" => $this->username,
                "password" => $this->encrypted_password,
            ];

            if($this->checkFieldValues()){
                $this->insertUser();
            }
        }

        private function checkFieldValues()
        {
            if (empty($this->username) || empty($this->raw_password)) {
                $this->error = "Both fields are required!";
                return false;
            } else {
                return true;
            }
        }

        private function usernameExists()
        {
            foreach ($this->stored_users as $user) {
                if ($this->username == $user['username']) {
                    $this->error = "Username already taken, please choose a different one.";
                    return true;
                }
            }
            return false;
        }

        private function insertUser()
        {
            if ($this->usernameExists() == FALSE) {
                array_push($this->stored_users, $this->new_user);
                if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                    return $this->success = "Registration successful!";
                } else {
                    return $this->error = "Something went wrong, please try again.";
                }
            }
        }
    }

    if (isset($_POST['register'])) {
        new RegisterUser($_POST['username'], $_POST['password']);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
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
        input[type="password"],
        input[type="email"] {
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
        <h2>Registration</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register" name="register">
            <input type="button" value="Login" onclick="location.href='login.php'"><br>

            <p class="error"><?php echo @$user->error; ?></p>
            <p class="success"><?php echo @$user->success; ?></p>
        </form>
    </div>
</body>

</html>