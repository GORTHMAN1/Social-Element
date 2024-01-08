<!-- Header -->

<?php
  $activePage = 'profile';
  include("includes/header.php");
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
    $numPosts = 0; // Replace with logic to get the actual number of posts
    $numFollowers = 0; // Replace with logic to get the actual number of followers
    $numFollowing = 0; // Replace with logic to get the actual number of following
  }
?>

<!-- Main Content -->
<div class="container mt-4">
  <div class="row">
    <!-- Sidebar -->
    <?php
      include("includes/sidebar.php");
    ?>
    <?php 
      if (!isset($_SESSION["userid"])) {   
    ?>
    <div class="col-lg-6">
      <h1>Profile page</h1>
      <div class="alert alert-info" role="alert">
        Please log in to continue.
      </div>
      <a href="login.php" class="btn btn-primary">Log In</a>
    </div>
    <?php 
      } else {
    ?>
    <div class="col-lg-8"> 
      <?php
        echo $isPrivate;
      ?>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Picture -->
              <div class="profile-picture text-center">
                <?php
                  if (!empty($profilePicture)) {
                    echo '<img src="' . $profilePicture . '" alt="Profile Picture" class="img-fluid rounded-circle">';
                  } else {
                    echo '<i class="bi bi-person-circle" style="font-size: 80px; color:grey"></i>';
                  }
                ?>
              </div>
            </div>
            <div class="col-md-9">
              <!-- User Information -->
              <div class="row align-items-center">
                <div class="col-md-4">
                  <h4><?php echo $_SESSION["username"]; ?></h4>
                </div>
                <div class="col-md-4">
                  <a href="settings.php" class="btn btn-primary">Edit profile</a>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-4">
                  <strong>Posts:</strong> <?php echo $numPosts; ?>
                </div>
                <div class="col-md-4">
                  <strong>Followers:</strong> <?php echo $numFollowers; ?>
                </div>
                <div class="col-md-4">
                  <strong>Following:</strong> <?php echo $numFollowing; ?>
                </div>
                <div class="col-md-4">
                  <strong>Private:</strong> <?php echo ($isPrivate == 1) ? 'Yes' : 'No'; ?>
                </div>
              </div>
              <?php if (!empty($profileDescription)) : ?>
                <div class="row mt-3">
                  <!-- Bio -->
                  <div class="col-md-12">
                    <strong>Bio:</strong> <?php echo $profileDescription; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Posts Section -->
      <div class="row mt-4">
        <div class="col-md-12">
          <h4>Posts</h4>
          <!-- Mock Post (Replace with actual posts) -->
          <div class="card">
            <div class="card-body">
              <p>This is a mock post.</p>
            </div>
          </div>
          <!-- Additional Posts Go Here -->
        </div>
      </div>
    </div>
    <?php
      }
    ?>
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
