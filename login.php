<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <title>Login</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      overflow: hidden; /* Hide horizontal scrollbar */
    }

    .left-section {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      color: black;
      padding: 20px;
    }

    .left-section h1 {
      font-size: 10.64vw;
      border: 4px solid #007bff;
      border-radius: 20%;
      padding: 5px 10px;
      margin-left: 200px;
    }

    .right-section {
      flex: 1;
      margin-right: 100px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .welcome {
      margin-bottom: 40px;
    }

    .login-container {
      width: 40%;
      border-radius: 20px;
      padding: 20px;
      border: 2px solid #007bff;
      background-color: #ffffff;
    }

    .login-container h3 {
      text-align: center;
    }

    .login-container form {
      margin-top: 20px;
    }

    .error-message {
      margin-top: 20px;
    }

  </style>
</head>
<body>

  <div class="left-section">
    <!-- Content for the left section -->
    <h1>SE</h1>
    <!-- Add any other content as needed -->
  </div>

  <div class="right-section">
    <!-- Login form in the right section -->
    <h3 class="welcome">Welcome back to SE!</h3>
    <div class="login-container">
      <form action="includes/handlers/login_handler.php" method="post">
        <h3>Login</h3>
        <div class="error-message">
          <?php
          if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION["error"]) . '</div>';
            // Clear the error message from the session
            $_SESSION["error"] = "";
          }
          ?>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        <!-- <p>Back home <a href="index.php">Back home</a>.</p> -->
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
