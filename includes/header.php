<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Social Element</title>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>

  <!-- Navigation Bar -->
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <span class="navbar-brand-circle">SE</span>
        <span class="navbar-brand-text">The Social Element</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          
          <!-- The sidebar takes over the navigation between pages

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="messages.php">Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="settings.php">Settings</a>
          </li>

          -->
          
          <!-- Log out will be displayed in the settings page, not here -->

          <li class="nav-item">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
