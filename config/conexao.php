<?php 

//Habilita a exibição de todos os erros para depuração. Usado apenas na contrução do codigo,
//deve ser excluido ao final pois pode vazar dados senssiveis.

ini_set('display_erros',1);
error_reporting(E_ALL);

// inicia a seção para todo o site 
session_start();

//Configurações do Banco de Dados 
$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "classificados_db";

// Cria a conexão
$conexao = mysqli_connect($servidor, $usuario_db, $senha_db, $banco);


// Verifica conexão
if (!$conexao) {
    die("FALHA NA CONEXÃO: ".mysqli_connect_error());
}

// Define o charset para UTF-8 para evitar problemas com acentuação
mysqli_set_charset($conexao, "utf8");


?>