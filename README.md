# php_blog
This is week two second activity for AASTU GDSC Laravel team.
This task was given after a brief introduction class to the PHP language.

Task Detail:

Set up the basic website structure: Start by creating the necessary files and folders for the website. Set up the HTML structure with appropriate CSS styling.

Implement user registration and login functionality: Use PHP to create a user registration form and a login form. store user passwords, and implement a login system using sessions and cookies.
 
Create a JSON file: Instead of using a database, create a JSON file to store the blog post data. The JSON file can have an array structure, with each element representing a blog post and its associated information (e.g., title, content, author, timestamp).

Create a form to add new blog posts: Design a form that allows users to create new blog posts. The form should include fields such as title, content, and any other relevant information. On submission, use PHP to read the JSON file, add the new blog post data to the JSON array, and write the updated JSON data back to the file.

Implement AJAX and JSON: Integrate AJAX functionality to enhance the user experience. Use JavaScript and AJAX to asynchronously load content, such as displaying blog posts without refreshing the page. Retrieve the blog post data from the JSON file using AJAX and dynamically populate the page.

Enable post editing and updating: Implement functionality that allows users to edit and update their existing blog posts. Create an interface where users can select a post to edit, pre-fill the form with the existing post data, update the corresponding JSON data, and write the updated JSON back to the file.

Implement post deletion: Add a feature to delete blog posts. Provide a confirmation prompt before deleting a post, remove the corresponding data from the JSON array, and update the JSON file.

Display individual post details: Create a page that displays the details of a specific blog post. Retrieve the necessary data from the JSON file based on a unique identifier and present it in a user-friendly format.

List all blog posts: Develop a page that lists all the blog posts in a specific order, such as by date or popularity. Retrieve the blog post data from the JSON file and display it dynamically on the page.

Implement logout functionality: Create a logout mechanism that destroys the user session and redirects users to the login page.
