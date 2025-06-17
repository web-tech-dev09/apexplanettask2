<?php
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= intval($_POST['id']); // Convert ID to an integer
    $title = $conn->real_escape_string($_POST['title']);

    // Ensure fields are not empty before updating
    if (!empty($id) && !empty($title)) {
        $sql = "delete from posts WHERE id='$id' and title='$title'";

        if ($conn->query($sql) === TRUE) {
            echo "Post Deleted successfully! Redirecting...";
           header("Refresh: 2; URL=dashboard.php"); // Redirect after 2 seconds
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    } else {
        echo "Error: Id and Title cannot be empty.";
    }
}

$conn->close();
?>