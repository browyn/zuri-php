<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    loginUser($email, $password);
}

function loginUser($email, $password)
{
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $handle = fopen("../storage/users.csv", "r");

    while (($data = fgetcsv($handle)) !== FALSE) {


        if ($data[1] == $email && $data[2] == $password) {

            fclose($handle);

            $username = str_split($email, strpos($email, '@'))[0]; // trims the first letters before `@` and uses it as username

            $_SESSION['user'] = $username;
            $_SESSION['userEmail'] = $email;

            header("location: ../dashboard.php");
            break;
        }
    }

    echo "User doesn't exist";
}
