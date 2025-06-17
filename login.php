<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        echo "<div class='success'>Login successful! Welcome, " . htmlspecialchars($username) . ". Redirecting...</div>";
        header("Refresh: 2; URL=crudform.php"); // Redirect after 2 seconds
    } else {
        echo "<div class='error'>Invalid credentials.</div>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right,rgb(238, 179, 177),rgb(221, 82, 82));
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(221, 144, 144, 0.2);
      width: 340px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      gap:10px;
      margin:10px 0;
    }
    button {
      width: 107%;
      padding: 10px;
      background:rgb(179, 182, 242);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      left:50%;
      margin-top: 1rem;;
    }
    button:hover {
      background:rgb(174, 177, 245);
    }
    .success {
      color: #2ecc71;
      text-align: center;
      margin-bottom: 1rem;
      font-weight: bold;
    }
    .error {
      color: #e74c3c;
      text-align: center;
      margin-bottom: 1rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <form method="POST">
      <h2>Login</h2>
      <input name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>