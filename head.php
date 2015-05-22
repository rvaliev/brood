<?php


/**
 * If user wasn't authorized set session to false.
 */
if (empty($_SESSION['user']))
{
    $_SESSION['user']['authorized'] = false;
}


/**
 * If logout button was clicked destroy session
 */
if ((isset($_GET['logout'])) && ($_GET['logout'] == true))
{
    $_SESSION['user'] = array();
    header("Location: index.php");
}