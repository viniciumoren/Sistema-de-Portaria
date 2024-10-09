<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right , rgba(20, 147,220),  rgb(17,54,71));
            width: 100%;
            height: 100vh;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://i0.wp.com/catagua.com.br/wp-content/uploads/2021/03/confira-as-vantagens-de-escolher-uma-casa-em-condominio-fechado.jpg?resize=1024%2C576&ssl=1);
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        div{
            /* background-color: rgba(0,0,0,0.6); */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            background-color: #2F3C50;
            color: white;

        }
        input::placeholder{
            color: white;
        }
        .inputSubmit {
            background-color: #7B61FF;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
        }
        .inputSubmit:hover{
            background-color: deepskyblue;
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
    <a href="home.php" class="btn-voltar">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="testeLogin.php" action='' method='POST'>
        <input type="text" name="email" placeholder="Usuário">
        <br><br>
        <input type="password" name="senha" placeholder="Senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="Login">
        </form>
    </div>
    
</body>
</html>