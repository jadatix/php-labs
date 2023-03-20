<?php
    $messages = [
        "login" => "Login must contain at least 4 characters and can only contain letters and numbers.",
        "password" => "Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter and one number.",
        "confirm_password" => "Confirm password is different!",
        "email" => "Email must be in the format: ^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"];
    $regexes = [
        "login" => "/^[a-zA-Z0-9]{4,}$/",
        "password" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",
        "email" => "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/"];
    $skip_validation = ["gender","confirm_password"];
    $errors = [];

    function display_error($message) {
        echo '<div class="validation-error">' . $message . '</div>';
    }
    
    function validate_field($field, $regex, $message) {
        global $errors;
        if(!preg_match($regex, $_POST[$field])) {
            $errors[$field] = $message;
        }
    }
    
    if(isset($_POST) && !empty($_POST)) {
        if($_POST["password"] != $_POST["confirm_password"]) {
            $errors["confirm_password"] = $messages["confirm_password"];
        }
        foreach($_POST as $key => $value) {
            if(!in_array($key, $skip_validation) ){
                print_r("key: ".$key);
                print_r("<br>");
                validate_field($key, $regexes[$key], $messages[$key]);
            }
        }
    }
    

    print_r($errors);
    print_r("<br>");
    if(empty($errors) && !empty($_POST)) {
        header('Location: index.php?action=main');
        exit();
    }

?>

<form action="" method="POST" class="login-form">
    <div class="field-container">
        <label for="login">Login</label>
        <input type="text" name="login" />
        <?php display_error($errors["login"]) ?>
    </div>
    <div class="field-container">
        <label for="password">Password</label>
        <input type="password" name="password" />
        <?php display_error($errors["password"]) ?>
    </div>
    <div class="field-container">
        <label for="confirm_password">Confirm password</label>
        <input type="password" name="confirm_password" />
        <?php display_error($errors["confirm_password"]) ?>
    </div>
    <div class="field-container">
        <label for="email">Email</label>
        <input type="text" name="email" />
        <?php display_error($errors["email"]) ?>
    </div>
    <fieldset>
        <legend>Gender</legend>
        <input type="radio" name="gender" value="female"  />
        <label for="gender">Female</label>
        <br>
        <input type="radio" name="gender" value="male" />
        <label for="gender">Male</label>
    </fieldset>
    <button class="submit-button" type="submit">Register</button>
</form>