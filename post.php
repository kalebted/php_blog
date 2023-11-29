<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $url = $_POST['url'];

    // Generate timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Create an associative array for the blog post
    $newPost = array(
        'title' => $title,
        'content' => $content,
        'timestamp' => $timestamp
    );

    // Read existing blog posts from the JSON file
    $postsJson = file_get_contents('posts.json');
    $posts = json_decode($postsJson, true);

    // Add the new post to the array of existing posts
    $posts[] = $newPost;

    // Encode the updated posts array into JSON format
    $updatedPostsJson = json_encode($posts, JSON_PRETTY_PRINT);

    // Save the updated JSON data back to the file
    file_put_contents('posts.json', $updatedPostsJson);

    // Redirect back to the form page or any other desired page
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>New Blog Post</title>
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

        .form-container {
            background-color: #fff;
            padding: 20px;
            border: 3px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            height: 200px;
        }

        .submit-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>New Blog Post</h1>

        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" required></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="submit-button">
                </div>
            </form>
        </div>
    </div>
</body>

</html>