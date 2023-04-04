<?php
    require_once("functions/user_sql_functions.php");
    require_once("layouts/message.php");
    
    if(!empty($_POST)) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = verify_login($login, $password);
        if(is_array($result)) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['admin'] = $result['admin'];
            header('Location: index.php?action=main');
            exit();
        } else { 
            showPopupMessage($result);
        }
    }
?>
<form action="" method="POST" class="login-form">
    <div class="field-container">
        <label for="login">Login</label>
        <input type="text" name="login" />
    </div>
    <div class="field-container">
        <label for="password">Password</label>
        <input type="password" name="password" />
    </div>
    <button class="submit-button" type="submit">Register</button>
</form>
