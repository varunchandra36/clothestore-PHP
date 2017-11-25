<?php
session_start();
session_destroy();

echo 'You successfully logged out.Click here to <a href="index.php">Login </a>';
?> 