<?php

session_start();
session_unset();
session_destroy();

// Going to back to frontpage

header("location: /SocialElement/login.php?error=none");

?>