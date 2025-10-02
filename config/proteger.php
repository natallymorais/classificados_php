<?php 
//inclui a conexão que por sua vez inicia a seção.
include_once(__DIR__ . '/conexao.php');

// verifica se a seção não existe
if (!isset($_SESSION['usuario_id'])) {
// Se usuario não exite, redireciona para o login
    header("Location: /mini_classificados/auth/login.php?erro=acesso_negado");
    exit();
}

// cybersecurity entraria nessa parte, protocolos https ...

?>