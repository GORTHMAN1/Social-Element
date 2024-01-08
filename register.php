<?php
  $error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <title>Register</title>
  <style>
    body {
      height: auto;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f8f9fa; /* Optional: Set a background color */
    }

    .register-container {
      width: 50%;
      max-width: 400px; /* Limit the width to 400px */
      border-radius: 20px;
      padding: 20px;
      border: 2px solid #007bff; /* Border color */
      background-color: #ffffff; /* Optional: Set a background color */
      margin-top: 50px; /* Adjust margin-top as needed */
      margin-bottom: 50px;
    }

    .register-container h2 {
      text-align: center;
    }

    .register-container form {
      margin-top: 20px;
    }

    .register-container p {
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="register-container">
    <h2>Register</h2>

    <!-- Display Errors -->
    <?php if ($error): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars(urldecode($error)); ?>
      </div>
    <?php endif; ?>

    <!-- Combined Form -->
    <form action="includes/handlers/register_handler.php" method="post" enctype="multipart/form-data" id="combinedForm">
      <!-- Register Section -->
      <div class="register-section">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="button" class="btn btn-primary btn-block" onclick="showAccountSetup()">Next</button>
      </div>

      <!-- Account Setup Section -->
      <div class="account-setup-section" style="display: none;">
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="mb-3">
          <label for="birthday" class="form-label">Birthday</label>
          <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>
        <div class="mb-3">
          <label for="profilePicture" class="form-label">Profile Picture (optional)</label>
          <input type="file" class="form-control" id="profilePicture" name="profilePicture" accept="image/*">
        </div>
        <div class="mb-3">
          <label for="bio" class="form-label">Bio (optional)</label>
          <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
      </div>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showAccountSetup() {
      document.querySelector('.register-section').style.display = 'none';
      document.querySelector('.account-setup-section').style.display = 'block';
    }
  </script>
</body>
</html>
