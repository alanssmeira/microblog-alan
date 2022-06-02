<?php
/* Aqui programaremos futuramente
os recursos de login/logout e verificação
de permissão de acesso dos usuários */

/* VERIFICANDO SE NÃO EXISTE UMA SESSÃO EM FUNCIONAMENTO */

if (!isset($_SESSION)) {
    session_start();
}

function verificaAcesso(){
    /* Se NÃO existe uma variável de sessão logada */
    if (!isset($_SESSION['id'])) {
        /* então significa que ele NÃO ESTÁ LOGADO, portanto apague qualquer resquício de sessão e force o usuário a ir para o login.php */
        session_destroy();
        header("location:../login.php");
        die();
    }
}

function login($id, $nome, $email, $tipo){
    /* Variáveis de sessão ao logar */
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['tipo'] = $tipo;
}


/*  Usado nas págs adm quando clicamos em sair */
function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    die();
}

function verificaAcessoAdmin(){

    /* Se o tipo de usuário logado NÃO FOR admin */
    if ($_SESSION['tipo'] != 'admin') {

        //Redirecione para a pág não autorizado
        header("location:nao-autorizado.php");
        die(); // ou exit
    }
}