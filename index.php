<?php
session_start();
require_once("Database/Conexao.php");
require_once("Model/Cliente.php");
require_once("Dao/UserDao.php");
$userdao = new ClienteDao();

$login = new ClienteDao();

if(!$login->checkLogin()) {
    header("Location: index.html");
}


?>