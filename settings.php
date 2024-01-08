<?php 
  $activePage = 'settings';
  include('includes/header.php');

  include("includes/classes/config.php");
  include("includes/classes/Profile.php");
  include("includes/classes/ProfileContr.php");
  include("includes/classes/ProfileView.php");

  // Instantiate the ProfileView class
  $profileView = new ProfileView();

  // Get user information
  if (isset($_SESSION["userid"])) {
    $userId = $_SESSION['userid'];
    $profileDescription = $profileView->fetchProfileDescription($userId);
    $profilePicture = $profileView->fetchProfilePicture($userId);
    $isPrivate = $profileView->fetchProfilePrivate($userId);
  }
?>

<!-- Main Content -->
<div class="container mt-4">
  <div class="row">
    <?php include('includes/sidebar.php'); ?>

    <!-- Main Content -->
    <div class="col-lg-8">
      <!-- Your settings content goes here -->
      <h1>Settings</h1>

      <?php
        // Check if the user is not logged in
        if(!isset($_SESSION["userid"])) 
        {
      ?>
      <!-- Display a message for users who are not logged in -->
      <p>Login to view settings.</p>
      <ul class="list-group">
        <li class="list-group-item">
          <!-- Provide a link to the login page -->
          <a href="login.php" class="btn btn-link text-decoration-none">Log In</a>
        </li>
      </ul>
      <?php
        }
      ?>

      <!-- Settings Options -->
      <?php
        // Check if the user is logged in
        if(isset($_SESSION["userid"])) 
        {
      ?>
      <!-- Display settings options for logged-in users -->
      <ul class="list-group">
      <li class="list-group-item">
          <!-- Edit Profile Option -->
          <a href="#editProfile" class="btn btn-link text-decoration-none" data-bs-toggle="collapse">Edit Profile</a>
          <!-- Edit Profile Submenu -->
          <div class="collapse" id="editProfile">
            <!-- Profile Edit Form -->
            <form action="includes/handlers/profile_handler.php" class="mt-2"method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Change Username</label>
                <input type="text" class="form-control" id="username" name="firstname" placeholder="Enter your username">
              </div>
              <div class="mb-3">
                <label for="profilePicture" class="form-label">Change Profile Photo</label>
                <input type="file" class="form-control" id="profilePicture" name="profilePicture">
              </div>
              <div class="mb-3">
                <label for="bio" class="form-label">Edit Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Enter your bio"></textarea>
              </div>
              <?php
                if($isPrivate == 0){
              ?>
              <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="privateProfile" id="privateProfile" value="1">
                <label class="form-check-label" for="privateProfile">Private Profile</label>
              </div>
              <?php
                } else if($isPrivate == 1){
              ?>
              <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" checked name="privateProfile" id="privateProfile" value="1">
                <label class="form-check-label" for="privateProfile">Private Profile</label>
              </div>
              <?php
                }
              ?>
              <button type="submit" class="btn btn-primary mb-2">Save Changes</button>
            </form>
          </div>
        </li>
        <li class="list-group-item">
          <!-- Change Password Option -->
          <a href="#changePassword" class="btn btn-link text-decoration-none" data-bs-toggle="collapse">Change Password</a>
          <!-- Change Password Submenu -->
          <div class="collapse" id="changePassword">
            <p>Change password settings here...</p>
          </div>
        </li>
        <li class="list-group-item">
          <!-- Notification Settings Option -->
          <a href="#notificationSettings" class="btn btn-link text-decoration-none" data-bs-toggle="collapse">Notification Settings</a>
          <!-- Notification Settings Submenu -->
          <div class="collapse" id="notificationSettings">
            <p>Notification settings here...</p>
          </div>
        </li>
        <li class="list-group-item">
          <!-- Verify Email Option -->
          <a href="#verifyEmail" class="btn btn-link text-decoration-none" data-bs-toggle="collapse">Verify Email</a>
          <!-- Verify Email Submenu -->
          <div class="collapse" id="verifyEmail">
            <p>Email verification settings here...</p>
          </div>
        </li>
        <li class="list-group-item">
          <!-- Website Settings Option -->
          <a href="#websiteSettings" class="btn btn-link text-decoration-none" data-bs-toggle="collapse">Website Settings</a>
          <!-- Website Settings Submenu -->
          <div class="collapse" id="websiteSettings">
            <p>Website settings here...</p>
          </div>
        </li>
        <li class="list-group-item">
          <!-- Log Out Option -->
          <a href="includes/handlers/logout_handler.php" class="btn btn-link text-decoration-none">Log Out</a>
        </li>
      </ul>
      <?php
        }
      ?>
    </div>
  </div>
</div>

<!-- Footer -->

<?php
  include("includes/footer.php");
?>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
