<nav>
    <ul>
        <li><a href="index.php?action=main">Home</a></li>
        <li><a href="index.php?action=registration">Sign up</a></li>
        <li><a href="index.php?action=about">About Us</a></li>
        <?php
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            echo '<li><a href="index.php?action=logout">Log out</a></li>';
        } else {
            echo '<li><a href="index.php?action=login">Log in</a></li>';
        } ?>
    </ul>
</nav>