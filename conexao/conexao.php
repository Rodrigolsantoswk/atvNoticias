<?php
    define('HOST', '127.0.0.1');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'noticias');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA) or die ('ERRO AO CONECTAR: '.mysqli_error());
    mysqli_select_db($conexao, DB) or die ('ERRO AO SELECIONAR O BANCO DE DADOS: '.mysqli_error());
?>