<?php
include 'db.php'; // Include database connection settings
// Validate and retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Prevent SQL injection
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    // Handle image upload
    $imageName = '';
    if (isset($_FILES['Image']) && $_FILES['Image']['error'] == UPLOAD_ERR_OK) {
        $targetDir = 'uploads/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageName = basename($_FILES['Image']['name']);
        $targetFile = $targetDir . $imageName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['Image']['tmp_name'], $targetFile)) {
                // Image uploaded successfully
            } else {
                $imageName = '';
                echo "Image upload failed.<br>";
            }
        } else {
            $imageName = '';
            echo "Invalid image type. Allowed: jpg, jpeg, png, gif.<br>";
        }
    }

    // Ensure title and content are not empty
    if (!empty($title) && !empty($content)) {
        // Insert data into table, including image
        $sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$imageName')";
        if ($conn->query($sql) === TRUE) { 
            echo "Record added successfully! Redirecting...";
            header("Refresh: 2; URL=crudread.php"); // Redirect after 2 seconds
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Title and content cannot be empty.<br>";
        echo "<br><a href='crudform.php'>Go back to form</a>";
    }
}
// Close connection
$conn->close();
?>