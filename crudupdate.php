<?php
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']); // Convert ID to an integer
    $new_title = $conn->real_escape_string($_POST['new_title']);
    $new_content = $conn->real_escape_string($_POST['new_content']);

    // Ensure fields are not empty before updating
    if (!empty($new_title) && !empty($new_content)) {
        $sql = "UPDATE posts SET title='$new_title', content='$new_content' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Post updated successfully! Redirecting...";
           header("Refresh: 2; URL=dashboard.php"); // Redirect after 2 seconds
        } else {
            echo "Error updating post: " . $conn->error;
        }
    } else {
        echo "Error: Title and content cannot be empty.";
    }
}

$conn->close();
?>