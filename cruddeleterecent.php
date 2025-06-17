<?php
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $limitofpost = $conn->real_escape_string($_POST['limitofpost']);

    // Ensure fields are not empty before updating
    if (!empty($limitofpost)) {
        $sql = "DELETE FROM posts ORDER BY id DESC LIMIT $limitofpost";

        if ($conn->query($sql) === TRUE) {
            echo "Recent Post Deleted successfully! Redirecting...";
           header("Refresh: 2; URL=dashboard.php"); // Redirect after 2 seconds
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    } else {
        echo "Error: Something went wrong.";
    }
}

$conn->close();
?>