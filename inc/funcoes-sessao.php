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