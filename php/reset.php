<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $newpassword = trim($_POST['password']);

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword)
{
    //open file and check if the username exist inside
    //if it does, replace the password

    $handle = fopen("../storage/users.csv", "r");

    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($data[1] == $email) {
            if ($data[2] = $newpassword) {
                fclose($handle);
                header("location: ../forms/login.html");
                break;
            }
        }
    }

    echo "User doesn't exist";
}
