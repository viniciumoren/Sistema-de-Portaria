<?php
    include('config.php');

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $status = $_POST['status'];
        $apartamento = $_POST['apartamento'];
        $data = $_POST['data'];
        

        $sqlUpdate = "UPDATE listaencomenda SET status ='$status', nome = '$nome', apartamento = '$apartamento',  data ='$data' 
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: listaEncomenda.php');

?>