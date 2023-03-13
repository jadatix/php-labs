<?php
    $login_regex = "/^[a-zA-Z0-9]{4,}$/";
    $password_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    $email_regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    $valid = true;
    $validated = false;

    function display_error($message) {
        echo '<div class="validation-error">' . $message . '</div>';
    }
    
    function validate_field($field, $regex, $message) {
        global $valid;
        global $validated;
        if(isset($_POST) && !empty($_POST[$field]) && !preg_match($regex, $_POST[$field])) {
            $valid = false;
            $validated = true;
            display_error($message);
        }
    }
    
    if($valid && !empty($_POST) && $validated) {
        header('Location: index.php?action=main');
        exit();
    }

?>

<form action="" method="POST" class="login-form">
    <div class="field-container">
        <label for="login">Login</label>
        <input type="text" name="login" />
        <?php validate_field("login", $login_regex, "Login must contain at least 4 characters and can only contain letters and numbers."); ?>
    </div>
    <div class="field-container">
        <label for="password">Password</label>
        <input type="password" name="password" />
        <?php validate_field("password", $password_regex, "Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter and one number."); ?>
    </div>
    <div class="field-container">
        <label for="confirm_password">Confirm password</label>
        <input type="password" name="confirm_password" />
        <?php if(isset($_POST) && $_POST["confirm_password"] != $_POST["password"] ) display_error("Confirm password is different!") ?>
    </div>
    <div class="field-container">
        <label for="email">Email</label>
        <input type="text" name="email" />
        <?php validate_field("email", $email_regex, "Email must be in the format: ^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"); ?>
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