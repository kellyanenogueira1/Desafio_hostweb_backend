<?php

    session_start(); //Para variáveis de sessão
    require_once('C:\xampp\htdocs\Gereciador de Tarefas\Desafio Backend\models\Database.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = " SELECT usuario, senha FROM logar WHERE usuario = '$usuario' AND senha = '$senha' ";

    $object = new Database();
    $conexao = $object->Connection();

    $result = mysqli_query($conexao, $sql);

    if($result){
        $dados_login = mysqli_fetch_array($result); //Transformando uma referência em array
        $_SESSION['usuario'] = $dados_login['usuario'];
        $_SESSION['senha'] = $dados_login['senha'];

        header("Location: ../views/adicionar_tarefa.php");

    } else {
        header('Location: ../views/index.php?erro=1'); //Forçando um redirecionamento para o index.php
    }

?>