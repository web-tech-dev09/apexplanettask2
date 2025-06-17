<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #c9ffbf, #ffafbd);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .update-container {
            background: white;
            padding: 2rem 2.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 400px;
        }
        .update-container h1 {
            text-align: center;
            margin-bottom: 1.2rem;
        }
        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="number"], input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        textarea {
            resize: vertical;
            min-height: 60px;
        }
        button {
            width: 107%;
            padding: 10px;
            background: #4e54c8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background: #3b3f99;
        }
    </style>
</head>
<body>
    <div class="update-container">
        <h1>Update Blog Post</h1>
        <form action="crudupdate.php" method="POST">
            <label for="id">Post ID (Existing):</label>
            <input type="number" name="id" required>

            <label for="old_title">Current Title:</label>
            <input type="text" name="old_title" required>

            <label for="old_content">Current Content:</label>
            <textarea name="old_content" required></textarea>

            <label for="new_title">New Title:</label>
            <input type="text" name="new_title" required>

            <label for="new_content">New Content:</label>
            <textarea name="new_content" required></textarea>

            <button type="submit" onclick="showMessage()">UPDATE</button>
        </form>
    </div>
    <script>
    function showMessage() {
        window.alert("Successfully updated the table!");
    }
    </script>
</body>
</html>