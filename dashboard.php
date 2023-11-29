<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Read blog posts from the JSON file
$postsJson = file_get_contents('posts.json');
$posts = json_decode($postsJson, true);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .header .buttons {
            display: flex;
            gap: 10px;
        }

        .header .buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .post {
            margin-bottom: 20px;
        }

        .post .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .post .timestamp {
            color: #888;
            font-size: 14px;
        }

        .post .content {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="buttons">
                <button onclick="window.location.href='post.php'">New Post</button>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
            <div class="content">
                <?php foreach ($posts as $post) : ?>
                    <div class="post">
                        <div class="title"><?php echo $post['title']; ?></div>
                        <div class="timestamp"><?php echo date('F j, Y H:i:s', strtotime($post['timestamp'])); ?></div>
                        <div class="content"><?php echo substr($post['content'], 0, 100); ?>... <a href="#">Read more</a></div>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</body>

</html>