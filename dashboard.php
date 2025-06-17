<?php
include 'db.php';
$sql = "SELECT * FROM posts ORDER BY creation_creds DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - My Blog Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgb(35, 33, 33);
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            max-width: 900px;
            margin: 40px auto;
            background:rgb(245, 95, 95) ;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(214, 200, 200, 0.08);
            padding: 30px 40px;
        }
        h1 {
            text-align: center;
            color: #2d3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            padding: 12px 10px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }
        th {
            background: #f0f4f8;
            color: #333;
        }
        tr:hover {
            background:rgb(188, 111, 111);
        }
        img {
            max-width: 80px;
            max-height: 80px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.07);
        }
        .no-image {
            color: #aaa;
            font-style: italic;
        }
        .actions {
            text-align: center;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: #4e54c8;
            font-weight: bold;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>My Blog Posts Dashboard</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>\n";
                    echo "<td>{$row['ID']}</td>\n";
                    echo "<td>" . htmlspecialchars($row['TITLE']) . "</td>\n";
                    echo "<td>" . nl2br(htmlspecialchars($row['CONTENT'])) . "</td>\n";
                    echo "<td>{$row['CREATION_CREDS']}</td>\n";
                    echo "<td>";
                    if (!empty($row['Image'])) {
                        echo "<img src='uploads/" . htmlspecialchars($row['Image']) . "' alt='Post Image' />";
                    } else {
                        echo "<span class='no-image'>No Image</span>";
                    }
                    echo "</td>\n";
                    echo "<td class='actions'>
                        <a href='crudupdateform.php?id={$row['ID']}'>Edit</a>
                        <a href='cruddeletionform.php?id={$row['ID']}'>Delete</a>
                    </td>\n";
                    echo "</tr>\n";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No posts found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
