<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 15:55
 */
session_start();

require 'vendor/autoload.php';
require 'Code.php';


function getSession($key){
    return (isset($_SESSION[$key]) ? $_SESSION[$key] : '');
}

function errorJs($message){
    return 'swal({ type: "error", title: "Hata", text: "'.$message.'"});';
}

function successJs($message){
    return 'swal({ type: "success", title: "Başarılı", text: "'.$message.'"});';
}

function dd($data){
    exit(var_dump($data));
}
?>

