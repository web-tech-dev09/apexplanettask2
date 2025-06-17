<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if username exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("Username already taken.");
    }
    $stmt->close();

    // Check password match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        echo "Registration successful.";
        header("Refresh: 2; URL=login.php"); 
    } else {
        echo "Registration failed.";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Create Account</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #ffecd2, #fcb69f);
      min-height: 100vh;
      margin: 0;
    }
    .page-header {
      text-align: center;
      color: #333;
      margin-top: 40px;
      margin-bottom: 40px;
      font-size: 2.2rem;
      letter-spacing: 1px;
    }
    .register-container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      width: 340px;
      margin: 0 auto;
      margin-bottom: 40px;
      margin-top: 7rem;
    }
    .register-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      margin-top: 3rem;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 107%;
      padding: 10px;
      background: #f67280;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }
    button:hover {
      background: #c06c84;
    }
    .login-link {
      display: block;
      text-align: center;
      margin-top: 1.2rem;
      color: #4e54c8;
      text-decoration: none;
      font-size: 0.98rem;
    }
    .login-link:hover {
      text-decoration: underline;
    }
    .message {
      text-align: center;
      margin-bottom: 1rem;
      color: #c06c84;
      font-weight: bold;
    }
  </style>
</head>
<body>
    <div class="page-header">BLOG WITH PHP</div>
    <div class="register-container">
      <form action="register.php" method="POST">
        <h2>Create Account</h2>
        <div class="message"><?php if (isset($_GET['msg'])) { echo htmlspecialchars($_GET['msg']); } ?></div>
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <button type="submit">Register</button>
      </form>
      <a class="login-link" href="login.php">Already have an account? Login here</a>
    </div>
</body>
</html>
<?php
