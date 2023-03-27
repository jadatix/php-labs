<?php

function insert_user($login, $password, $email, $gender) {
    global $connection;
    
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (login, password, email, gender) VALUES ('$login', '$password', '$email', $gender)";

    if (!mysqli_query($connection, $query)) {
        die("Error inserting user: " . mysqli_error($connection));
    }
}

?>
