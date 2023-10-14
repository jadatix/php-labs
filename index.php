<?php 
    // session_start();
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    require_once("layouts/header.php");
    require_once("functions/user_sql_functions.php");
    $connection = mysqli_connect(
        getenv('DB_HOST'), 
        getenv('DB_USER'), 
        getenv('DB_PASSWORD'), 
        getenv('DB_NAME'));

    if(isset($_GET["action"]) && file_exists("views/". $_GET["action"] . ".php") ) {
        include_once("views/". $_GET["action"] . ".php");
    }
    else {
        require_once("views/main.php");
    }
    require_once("layouts/footer.php");
?>