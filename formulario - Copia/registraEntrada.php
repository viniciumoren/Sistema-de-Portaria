<?php
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Obtém os valores dos campos do formulário
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $documento = mysqli_real_escape_string($conexao, $_POST['documento']);
    $destino = mysqli_real_escape_string($conexao, $_POST['destino']);
    $motivo = mysqli_real_escape_string($conexao, $_POST['motivo']);
    $veiculo = mysqli_real_escape_string($conexao, $_POST['veiculo']);
    $placa = mysqli_real_escape_string($conexao, $_POST['placa']);
    $data = mysqli_real_escape_string($conexao, $_POST['data']);

    // Cria a query de inserção
    $query = "INSERT INTO listaentrada(nome, documento, destino, motivo, veiculo, placa, data) 
              VALUES ('$nome', '$documento', '$destino', '$motivo', '$veiculo', '$placa', '$data')";

    // Executa a consulta
    if (mysqli_query($conexao, $query)) {
        // Redireciona para a lista de entradas se a inserção for bem-sucedida
        header('Location: listaEntrada.php');
        exit();
    } else {
        // Exibe uma mensagem de erro se a consulta falhar
        $error_message = "Erro ao inserir dados: " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
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
    <a href="listaEntrada.php" class="btn-voltar">Voltar</a>
    <div class="box">
        <form action="registraEntrada.php" method='POST'>
            <fieldset>
                <legend><b>Formulario de Entrada</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="documento" id="documento" class="inputUser" required>
                    <label for="documento" class="labelInput">Documento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="destino" id="destino" class="inputUser" required>
                    <label for="destino" class="labelInput">Destino</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="motivo" id="motivo" class="inputUser" required>
                    <label for="motivo" class="labelInput">Motivo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="veiculo" id="veiculo" class="inputUser" required>
                    <label for="veiculo" class="labelInput">Veiculo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="placa" id="placa" class="inputUser" required>
                    <label for="placa" class="labelInput">Placa</label>
                </div>
                <br><br>
                <div class="box_data_nascimento">
                    <input type="hidden" name="data" id="data">
                </div>
                <br><br>
                <!-- Mensagem de erro -->
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <!-- Adicionando os vídeos -->
    <video id="video-titulo" muted>
        <source src="video/formulario-entrada.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-nome" muted>
        <source src="video/nome.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-documento" muted>
        <source src="video/documento.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-destino" muted>
        <source src="video/destino.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-motivo" muted>
        <source src="video/motivo.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-veiculo" muted>
        <source src="video/veiculo.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-placa" muted>
        <source src="video/placa.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>
    <video id="video-submit" muted>
        <source src="video/enviar.mp4" type="video/mp4">
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
            video.play(); // Iniciar o vídeo
        }

        // Função para esconder o vídeo
        function hideVideo(videoId) {
            const video = document.getElementById(videoId);
            video.style.display = 'none';
            video.pause(); // Pausar o vídeo
            video.currentTime = 0; // Reiniciar o vídeo
        }

        // Ações para mostrar/esconder o vídeo ao passar o mouse sobre os inputs e botões
        document.getElementById('nome').addEventListener('mouseover', () => showVideo('video-nome'));
        document.getElementById('nome').addEventListener('mouseout', () => hideVideo('video-nome'));

        document.getElementById('documento').addEventListener('mouseover', () => showVideo('video-documento'));
        document.getElementById('documento').addEventListener('mouseout', () => hideVideo('video-documento'));

        document.getElementById('destino').addEventListener('mouseover', () => showVideo('video-destino'));
        document.getElementById('destino').addEventListener('mouseout', () => hideVideo('video-destino'));

        document.getElementById('motivo').addEventListener('mouseover', () => showVideo('video-motivo'));
        document.getElementById('motivo').addEventListener('mouseout', () => hideVideo('video-motivo'));

        document.getElementById('veiculo').addEventListener('mouseover', () => showVideo('video-veiculo'));
        document.getElementById('veiculo').addEventListener('mouseout', () => hideVideo('video-veiculo'));

        document.getElementById('placa').addEventListener('mouseover', () => showVideo('video-placa'));
        document.getElementById('placa').addEventListener('mouseout', () => hideVideo('video-placa'));

        // Para o título
        document.querySelector('legend').addEventListener('mouseover', () => showVideo('video-titulo'));
        document.querySelector('legend').addEventListener('mouseout', () => hideVideo('video-titulo'));

        // Para o botão de submit
        document.getElementById('submit').addEventListener('mouseover', () => showVideo('video-submit'));
        document.getElementById('submit').addEventListener('mouseout', () => hideVideo('video-submit'));

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
        document.querySelector('form').addEventListener('submit', function (e) {
            // Atualizar o campo oculto com a data e hora atuais
            document.getElementById('data').value = formatarDataHora(new Date());
        });
    </script>
</body>

</html>