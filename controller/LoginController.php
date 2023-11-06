<?php

require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class LoginController {

    private LoginService $loginService;
    private UsuarioDAO $usuarioDAO;

    public function __construct() {
        $this->loginService = new LoginService();
        $this->usuarioDAO = new UsuarioDAO();     
    }

    public function logar($usuario, $senha) {
        $erros = $this->loginService->validarDados($usuario, $senha);

        if(! empty($erros))
            return $erros;
        
        $usuario = $this->usuarioDAO->findByLoginSenha($usuario, $senha);
        if(! $usuario)
            return array("Usuário ou Senha inválidos!");

        //TODO - Salvar usuário na sessão

        //Retorna um array vazio para indicar que tudo deu certo
        return array();
        
    }

    public function deslogar() {
        
    }

    public function verificarUsuarioLogado() {
        
    }

    public function getNomeUsuario() {
        
    }
}