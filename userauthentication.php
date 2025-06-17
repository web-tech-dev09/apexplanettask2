<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <style>
    body {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #74ebd5, #ACB6E5);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-container {
  background: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  width: 300px;
}

.login-container h2 {
  text-align: center;
  margin-bottom: 1.5rem;
}

input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border-radius: 5px;
  border: 1px solid #ccc;
}

button {
  width: 100%;
  padding: 10px;
  background: #4e54c8;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
  </style>
</head>
<body>
  <div class="login-container">
    <form action="login.php" method="POST">
      <h2>Login</h2>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>