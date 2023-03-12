<?php 
    require_once("layouts/header.php");
    if(isset($_GET["action"]) && file_exists("views/". $_GET["action"] . ".php") ) {
        include_once("views/". $_GET["action"] . ".php");
    }
    else {
        require_once("views/main.php");
    }
    require_once("layouts/footer.php");
?>