<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    registerUser($username, $email, $password);
}

function registerUser($username, $email, $password)
{
    //save data into the file
    $fields = [$username, $email, $password];

    $file = "../storage/users.csv"; //filename

    $file = fopen($file, 'a');
    fputcsv($file, $fields);
    fclose($file);
    // echo "OKAY";
}
echo "User Successfully registered";
