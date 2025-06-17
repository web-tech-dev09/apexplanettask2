<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:url(https://images.pexels.com/photos/1493226/pexels-photo-1493226.jpeg);
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .heading {
            text-align: center;
            color:rgb(232, 233, 234);
        }
        main {
            max-width: 600px;
            margin: auto;
            background:url(https://images.pexels.com/photos/3101527/pexels-photo-3101527.jpeg);
            background-size: cover;
            background-position: center;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color:rgb(24, 21, 20);
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 15px;
            background-color:rgb(52, 53, 54);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .button-group {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 40px;
            margin: 20px 0;
        }
        .input-field {
            width:96%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 5px solid #ccc;
            box-shadow: 20px 20px 20px rgba(169, 76, 76, 0.1);
        }
        .view
        {
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1 class="heading">BASIC CRUD FORM</h1>
    <main>
        <form action="crudprocess.php" method="post" enctype="multipart/form-data">
            <label for="title">TITLE:</label>
            <br>
            <input type="text" name="title" id="intake" required class="input-field">
            <br>
            <label for="content">CONTENT:</label>
            <br>
            <textarea name="content" id="intake" required class="input-field" rows="10px" cols="5px"></textarea>
            <br>
            <label for="Image">Upload Photo:</label>
            <br>
            <input type="file" name="Image" accept="Image/*" class="input-field"><br>

            <br>
            <br>
            <div class="button-group">
                <button type="submit">SUBMIT</button>
                <button type="button" onclick="redirect()">UPDATE POST</button>
                <button type="button" onclick="todel()">DELETE POST</button>
            </div>
            <br>
            <div class="view">
            <a href="dashboard.php">View All Posts</a>
            </div>
        </form>
    </main>
    <script>
        function redirect() {
            window.location.href = "crudupdateform.php"; // Redirects to nextpage.html
        }
        function todel() {
            window.location.href = "cruddeletionform.php"; // Redirects to delete form
        }
    </script>
</body>
</html>