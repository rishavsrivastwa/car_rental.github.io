<?php
// Start a new or resume an existing session
session_start();

// Function to check if the user is logged in
function isUserLoggedIn()
{
    return isset($_SESSION['logged_in']) && isset($_SESSION["type"]) && $_SESSION['logged_in'] === true;
}
?>

