<?php

/*use src\ProjectBrood\business\UsersBusiness;
use Doctrine\Common\ClassLoader;


require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();




$obj = new UsersBusiness();
//$broden = $obj->overzichtUser();


$aa = $obj->overzichtUser();
$aa = $aa[0];

echo "<pre>";
print_r($aa->getUserId());
echo "</pre>";*/


session_start();

echo "<pre>";
print_r($_SESSION['user']);
echo "</pre>";

/*
function better_crypt($input, $rounds = 10) {
    $crypt_options = array('cost' => $rounds);
    $hash = password_hash($input, PASSWORD_BCRYPT, $crypt_options);
    return $hash; }
$password_hash = better_crypt("123456");
echo $password_hash;*/