<!-- Header -->
<?php
  $activePage = 'home';
  include("includes/header.php"); 
?>
  <!-- Main Content -->
  <div class="container mt-4">
    <div class="row">
      <!-- Sidebar -->

      <?php 
        include("includes/sidebar.php");
      ?>

      <div class="col-lg-6">
        
      <!-- Your main content goes here -->

      <?php
      if (!isset($_SESSION["userid"])) {
      ?>
      <h1>Welcome to SE</h1>
      <div class="alert alert-info" role="alert">
        Please log in to continue.
      </div>
      <a href="login.php" class="btn btn-primary">Log In</a>
      <?php
      } else {
      ?>
      <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <div class="container-fluid">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#" id="forYouSectionLink">For you</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="followingSectionLink">Following</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Line between navigation bar and posts -->
      <hr class="mb-3">
      <!-- Post Template 1: Text and Photo -->
      <div class="card mb-4">
          <div class="card-header">
              <strong>User1</strong> posted a photo
          </div>
          <div class="fakeimg img-fluid"></div>
          <div class="card-body">
              <p class="card-text">This is a fake photo post with some text.</p>
          </div>
          <div class="card-footer">
              <button type="button" class="btn btn-outline-none"><i class="bi-heart like"></i></button>
              <button type="button" class="btn btn-outline-none"><i class="bi-chat comment"></i></button>
          </div>
      </div>

      <!-- Post Template 2: Text Only -->
      <div class="card mb-4">
          <div class="card-header">
              <strong>User2</strong> posted a text update
          </div>
          <div class="card-body">
              <p class="card-text">This is a text-only post without a photo.</p>
          </div>
          <div class="card-footer">
              <button type="button" class="btn btn-outline-none"><i class="bi-heart like"></i></button>
              <button type="button" class="btn btn-outline-none"><i class="bi-chat comment"></i></button>
          </div>
      </div>

      <!-- Post Template 3: Photo Only -->
      <div class="card mb-4">
          <div class="card-header">
              <strong>User3</strong> posted a photo
          </div>
          <div class="fakeimg img-fluid"></div>
          <div class="card-footer">
              <button type="button" class="btn btn-outline-none"><i class="bi-heart like"></i></button>
              <button type="button" class="btn btn-outline-none"><i class="bi-chat comment"></i></button>
          </div>
      </div>
      <?php
      }
      ?>
      </div>  
      
      <!-- Suggested section -->

      <?php 
        if(isset($_SESSION["userid"])){
          include("includes/suggested_sidebar.php");
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
