<!-- Sidebar -->
<div class="col-lg-3">
    <nav class="sticky-top sticky-sidebar">
        <!-- Sidebar content goes here -->
        <div class="list-group">
            <a href="index.php" class="list-group-item list-group-item-action <?php echo ($activePage == 'home') ? 'active' : ''; ?>">
                <i class="bi-house-door"></i> Feed
            </a>
            <a href="profile.php" class="list-group-item list-group-item-action <?php echo ($activePage == 'profile') ? 'active' : ''; ?>">
                <i class="bi-person"></i> Profile
            </a>
            <a href="messages.php" class="list-group-item list-group-item-action <?php echo ($activePage == 'messages') ? 'active' : ''; ?>">
                <i class="bi-chat"></i> Messages
            </a>
            <a href="settings.php" class="list-group-item list-group-item-action <?php echo ($activePage == 'settings') ? 'active' : ''; ?>">
                <i class="bi-gear"></i> Settings
            </a>
            <!-- Add more navigation links as needed -->
        </div>

        <!-- "Create a Post" button outside of the list-group -->
        <button type="button" class="btn btn-outline-primary mt-3 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#postModal">
            Create a Post
        </button>
    </nav>
</div>

<!-- Post Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Create a Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="postText" class="form-label">Post Text</label>
                        <textarea class="form-control" id="postText" name="postText" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="postImage" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="postImage" name="postImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
