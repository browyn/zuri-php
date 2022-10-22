<?php
session_start();
function logout()
{

    if (session_destroy()) {
        header("Location: ../forms/login.html");
    }
}

logout();
