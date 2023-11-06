<?php 
//Pagina para sair da aplicação (logoff do usuário)

include_once(__DIR__ . "/../../controller/LoginController.php");

$loginCont = new LoginController();
$loginCont->deslogar();
header("location: " . BASE_URL . "/view/login/login.php");