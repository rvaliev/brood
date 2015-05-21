<?php

ob_start();
session_start();


if (isset($_GET['id']))
{
    echo "<pre>";
    print_r($_SESSION['bestelling']);
    echo "</pre>";

    unset($_SESSION['bestelling'][$_GET['id']]);
    header("Location: overzicht.php");
}
else{
    header('Location: index.php');
}


ob_flush();