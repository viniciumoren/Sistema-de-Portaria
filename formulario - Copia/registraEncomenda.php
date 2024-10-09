<?php
if (isset($_POST['submit'])) {
    // Uncomment to debug input data
    /*
    print_r('Nome:' .$_POST['nome']);
    print_r('<br>');
    print_r('Status:' .$_POST['status']);
    print_r('<br>');
    print_r('Apartamento:' .$_POST['apartamento']);
    print_r('<br>');
    print_r('Data:' .$_POST['data']);
    print_r('<br>');
    */

    include_once('config.php');

    $status = $_POST['status'];
    $nome = $_POST['nome'];
    $apartamento = $_POST['apartamento'];
    $data = $_POST['data'];

    $result = mysqli_query($conexao, "INSERT INTO listaencomenda(status,nome,apartamento,data) 
        VALUES ('$status','$nome','$apartamento', '$data')");

    header('location: listaEncomenda.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | GN</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            width: 100%;
            height: 100vh;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://i0.wp.com/catagua.com.br/wp-content/uploads/2021/03/confira-as-vantagens-de-escolher-uma-casa-em-condominio-fechado.jpg?resize=1024%2C576&ssl=1);
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            border-radius: 15px;
            width: 300px;
            color: white;
        }

        fieldset {
            border: 3px solid dodgerblue;
        }

        legend {
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
            color: white;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            color: black;
            outline: none;
            background-color: white;
            font-size: 15px;
            width: 50%;
        }

        .box_data_nascimento {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 3px;
        }

        #submit {
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }

        video {
            display: none;
            position: fixed;
            margin-left: 1100px;
            margin-top: 250px;
            bottom: 20px;
            right: 20px;
            width: 150px;
            height: 255px;
            border: 5px solid dodgerblue;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #000;
        }

        .btn-voltar {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-family: Arial, sans-serif;
            color: white;
            background-color: dodgerblue;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid dodgerblue;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
            margin-bottom: 20px;
            /* Espaçamento inferior */
        }

        .btn-voltar:hover {
            background-color: white;
            color: dodgerblue;
            transform: scale(1.05);
            /* Efeito de zoom ao passar o mouse */
        }

        .btn-voltar:active {
            background-color: #1E90FF;
            /* Cor mais escura ao clicar */
            transform: scale(1);
            /* Retira o efeito de zoom */
        }
        
    </style>
</head>

<body>
    <a href="listaEncomenda.php" class="btn-voltar">Voltar</a>
    <div class="box">
        <form action="registraEncomenda.php" method='POST'>
            <fieldset>
                <legend><b>Formulario de Encomenda</b></legend>
                <br><br> <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="apartamento" id="apartamento" class="inputUser" required>
                    <label for="apartamento" class="labelInput">Apartamento</label>
                </div>

                <br><br>

                <p>Status</p>
                <label for="recebido">Recebido</label>
                <input type="radio" id="recebido" name="status" value="recebido" required>
                <br>
                <label for="entregue">Entregue</label>
                <input type="radio" id="entregue" name="status" value="entregue" required>
                <br><br>

                <div class="box_data_nascimento">
                    <input type="hidden" name="data" id="data">
                </div>

                <br><br><br>

                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <!-- Adicionando os elementos de vídeo -->
    <video id="video-nome" width="300" height="200" muted>
        <source src="video/nome.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-apartamento" width="300" height="200" muted>
        <source src="video/apartamento.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-status" width="300" height="200" muted>
        <source src="video/status.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-formulario" width="300" height="200" muted>
        <source src="video/formulario-encomenda.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-submit" width="300" height="200" muted>
        <source src="video/enviar.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-recebido" width="300" height="200" muted>
        <source src="video/recebido.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-entregue" width="300" height="200" muted>
        <source src="video/entregue.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-titulo" muted>
        <source src="video/formulario-encomenda.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-voltar" muted>
        <source src="video/voltar.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <script>
        // Função para mostrar o vídeo
        function showVideo(videoId) {
            const video = document.getElementById(videoId);
            video.style.display = 'block';
            video.play(); // Tocar o vídeo
        }

        // Função para esconder o vídeo
        function hideVideo(videoId) {
            const video = document.getElementById(videoId);
            video.style.display = 'none';
            video.pause(); // Pausar o vídeo
            video.currentTime = 0; // Reiniciar o vídeo
        }

        // Associando eventos de mouseover e mouseout para os inputs
        document.getElementById('nome').addEventListener('mouseover', () => showVideo('video-nome'));
        document.getElementById('nome').addEventListener('mouseout', () => hideVideo('video-nome'));

        document.getElementById('apartamento').addEventListener('mouseover', () => showVideo('video-apartamento'));
        document.getElementById('apartamento').addEventListener('mouseout', () => hideVideo('video-apartamento'));

        // Associando eventos de mouseover e mouseout para as labels de status
        document.querySelector("label[for='recebido']").addEventListener('mouseover', () => showVideo('video-recebido'));
        document.querySelector("label[for='recebido']").addEventListener('mouseout', () => hideVideo('video-recebido'));

        document.querySelector("label[for='entregue']").addEventListener('mouseover', () => showVideo('video-entregue'));
        document.querySelector("label[for='entregue']").addEventListener('mouseout', () => hideVideo('video-entregue'));

        // Adicionando mouseover e mouseout para o botão de submit
        document.getElementById('submit').addEventListener('mouseover', () => showVideo('video-submit'));
        document.getElementById('submit').addEventListener('mouseout', () => hideVideo('video-submit'));

        document.querySelector('legend').addEventListener('mouseover', () => showVideo('video-titulo'));
        document.querySelector('legend').addEventListener('mouseout', () => hideVideo('video-titulo'));

        document.querySelector('p').addEventListener('mouseover', () => showVideo('video-status'));
        document.querySelector('p').addEventListener('mouseout', () => hideVideo('video-status'));

        document.querySelector('.btn-voltar').addEventListener('mouseover', () => showVideo('video-voltar'));
        document.querySelector('.btn-voltar').addEventListener('mouseout', () => hideVideo('video-voltar'));

        // Função para formatar a data e hora no formato adequado
        function formatarDataHora(data) {
            const ano = data.getFullYear();
            const mes = String(data.getMonth() + 1).padStart(2, '0');
            const dia = String(data.getDate()).padStart(2, '0');
            const horas = String(data.getHours()).padStart(2, '0');
            const minutos = String(data.getMinutes()).padStart(2, '0');
            return `${ano}-${mes}-${dia}T${horas}:${minutos}`; // T para datetime-local
        }

        // Definir a data e hora atuais no input ao abrir o formulário
        document.getElementById('data').value = formatarDataHora(new Date());

        // Evento de envio do formulário
        document.getElementById('your-form-id').addEventListener('submit', function (e) {
            // Atualizar o campo oculto com a data e hora atuais
            document.getElementById('data').value = formatarDataHora(new Date());
        });

    </script>
</body>

</html>