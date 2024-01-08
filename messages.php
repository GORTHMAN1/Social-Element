<?php 
  $activePage = 'messages';
  include('includes/header.php');
?>

<!-- Main Content -->
<div class="container mt-4">
  <div class="row">
    <?php include('includes/sidebar.php'); ?>

    <!-- Main Content -->
    <div class="col-lg-8">
      <!-- Your messaging content goes here -->
      <h1>Messages</h1>
      <p>This is your messaging page content.</p>
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