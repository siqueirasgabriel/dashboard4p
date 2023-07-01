<?php
/* DOIS MODOS POSSÍVEIS -> local, producao*/
$modo = 'producao'; 

if($modo =='local'){
    $servidor ="localhost";
    $usuario = "postgres";
    $senha = "Agencia4p";
    $banco = "login";
}

if($modo =='producao'){
    $servidor ="191.101.71.145";
    $usuario = "postgres";
    $senha = "Agencia4p";
    $banco = "teste";
}

try{
   $pdo = new PDO("pgsql:host=$servidor;port=5432;dbname=$banco",$usuario,$senha); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "Banco conectado com sucesso!"; 
}catch(PDOException $erro){
    echo "Falha ao se conectar com o banco! ";
}

function limparPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}