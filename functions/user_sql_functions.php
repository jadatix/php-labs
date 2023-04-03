<?php

function insert_user($login, $password, $email, $gender) {
    global $connection;
    
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (login, password, email, gender) VALUES ('$login', '$password', '$email', $gender)";

    if (!mysqli_query($connection, $query)) {
        die("Error inserting user: " . mysqli_error($connection));
    }
}

function verify_login($login, $password) {
    global $connection;

    $query = "SELECT * FROM users WHERE login = '$login'";

    $result = mysqli_query($connection, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        return "Not found user with login: $login";
    }

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        return $user;
    } else {
        return "Wrong password";
    }
}

?>
