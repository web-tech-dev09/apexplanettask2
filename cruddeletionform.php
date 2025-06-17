<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Post</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .delete-container {
            background: white;
            padding: 2rem 2.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 370px;
        }
        .delete-container h1 {
            text-align: center;
            margin-bottom: 1.2rem;
        }
        .delete-container p {
            text-align: center;
            color: #555;
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 107%;
            padding: 10px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        button:hover {
            background: #c0392b;
        }
        .recent-section {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <h1>Delete Blog Post</h1>
        <p>To delete a post, please enter the ID of the post you wish to delete along with its title.</p>
        <form action="cruddelete.php" method="POST">
            <label for="id">Post ID (Existing):</label>
            <input type="number" name="id" required>

            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <button type="submit">DELETE</button>
        </form>

        <div class="recent-section">
            <p>To delete the most recent post, click below:</p>
            <form action="cruddeleterecent.php" method="POST">
                <label for="limitofpost">Limit:</label>
                <input type="number" name="limitofpost" value="1" required>
                <button type="submit">DELETE RECENT POST</button>
            </form>
        </div>
    </div>
</body>
</html>