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

        <?php
        // Read blogs from JSON file
        $blogsJson = file_get_contents('blogs.json');
        $blogs = json_decode($blogsJson, true);

        // Loop through blogs and output them
        foreach ($blogs as $blog) {
            echo '<div class="blog">';
            echo '<h2>' . $blog['title'] . '</h2>';
            echo '<p class="blog-date">Posted on ' . $blog['date'] . '</p>';
            echo '<p>' . $blog['content'] . '</p>';
            echo '<a class="blog-link" href="' . $blog['url'] . '">Read More</a>';
            echo '</div>';
        }
        ?>

    </div>
</body>

</html>