<?php
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit();
    }
?>

<div class="container">
    <h1>Registration Successful</h1>
    <p>Your account has been created successfully.</p>
    <p><a href="index.php">Go to Main Page</a></p>
</div>