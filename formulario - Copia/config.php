<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'formulario_gustavo';

    // Criar a conexão
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verificar a conexão
    // if ($conexao) {
    //     // Exibir mensagem de erro se a conexão falhar
    //     echo 'Conexão efetuada com sucesso';    } 
    // else 
    // {
    //     // Exibir mensagem de sucesso se a conexão for bem-sucedida
    //     echo 'Conexão efetuada com sucesso';
    // }

    // // Fechar a conexão
// $servename = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'formulario-gustavo';


// try {
//     $pdo = new PDO("mysql:host=$servename;dbname=$dbname", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo    "cconexao pdo bem-sucedida";
// } catch (PDOException $e) {
//     echo"Conexao PDO falhou". $e->getMessage() ."";
// }

?>
