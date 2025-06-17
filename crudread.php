<?php
include 'db.php';
// Fetch all posts from the database
$sql = "SELECT * FROM posts ORDER BY creation_creds DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BLOG ENTRIES</title>
</head>
<body>
    <h2>BLOG POST USERS</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CONTENT</th>
            <th>CREATION CREDS</th>
            <th>IMAGE</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['TITLE']}</td>
                        <td>{$row['CONTENT']}</td>
                        <td>{$row['CREATION_CREDS']}</td>
                        <td>";
                if (!empty($row['Image'])) {
                    echo "<img src='uploads/{$row['Image']}' alt='Post Image' style='max-width:100px;max-height:100px;' />";
                } else {
                    echo "No Image";
                }
                echo "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>