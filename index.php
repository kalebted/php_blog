<?php
// Read blog posts from the JSON file
$postsJson = file_get_contents('posts.json');
$posts = json_decode($postsJson, true);
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: bisque;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .blog {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            margin: 0;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button-link {
            text-decoration: none;
            color: #fff;
        }

        /* style from dashboard */
        .content {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
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

        /* end of dash style */
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>My Blogging Site</h1>
            <div class="header-buttons">
                <button class="button" onclick="location.reload()">Refresh</button>
                <a class="button button-link" href="login.php">Login</a>
            </div>
        </div>

        <?php foreach ($posts as $post) : ?>
            <div class="content">
                <div class="post">
                    <div class="title"><?php echo $post['title']; ?></div>
                    <div class="timestamp"><?php echo date('F j, Y H:i:s', strtotime($post['timestamp'])); ?></div>
                    <div class="content"><?php echo substr($post['content'], 0, 300); ?>... <a href="#">Read more</a></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>