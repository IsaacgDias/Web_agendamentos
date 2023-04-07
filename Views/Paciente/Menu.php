<?php

require_once("../../Model/Cliente.php");
require_once("../../Dao/UserDao.php");
$cliente = new Cliente();

$login = new ClienteDao();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

body{
    background-color: #e5f9ff;
}

form{
    width: 30%;
    margin: 0 auto;
    margin-top: 5%;
    margin-bottom: 5%;
}

input, select{
    width: 60%;
    height: 40px;
    border-radius: 5px;
    outline: none;
    margin-top: 5px;
    font-size: 13pt;
    border: 1px solid #000;
    font-size: 13pt;
}

label{
    font-size: 13pt;
}

textarea{
    width: 60%;
    height: 100px;
    resize: none;
    border: 1px solid #000;
    border-radius: 5px;
    font-size: 13pt;
}

button{
    margin: 0 auto;
    width: 180px;
    height: 50px;
    border-radius: 90px;
    border: none;
    font-size: 15pt;
    cursor: pointer;
    background-color: #c4c4c4;
}

button:hover{
    box-shadow: 0 0 8px #454545;
}

#btn > a > button{
    width: 100%;
    height: 120px;
    font-size: 21pt;
    margin: 0 auto;
}

#btn{
    margin: 0 auto;
    width: 30%;
    margin-top: 5%;
}

.voltar{
    font-size: 13pt;
}

table{
    width: 55%;
    border: #000 1px solid;
    text-align: left;
    border-collapse: collapse;
}

tr{
    border-bottom: #000 1px solid;
}

#agendarC{
    width: 80px;
    height: 40px;
    font-size: 13pt;
    border: 1px solid #000;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: #bebebe;
}

img{
    width: 200px;
    margin-left: 25%;
}

</style>

</head>
<body>
<script src="https://unpkg.com/blip-chat-widget" type="text/javascript"></script>
<script>
    (function () {
        window.onload = function () {
            new BlipChat()
                .withAppKey('Y29uZWN0YXZlbGluaG9zOjJkMjY3N2E4LWYzYTMtNDZkNy1hYjdmLWE1MmYzMjE2NDQ2Ng==')
                .withButton({"color":"#2CC3D5","icon":""})
                .withCustomCommonUrl('https://isaac-goncalves-dias-gs51r.chat.blip.ai/')
                .build();
        }
    })();
</script>
            
<div id="btn">

        <img src="../../img/CONECTA.png" alt=""><br><br>

        <a href="agendados.php"><button>Minhas solicitações</button></a><br><br>
        <a href="sloconfirmado.php"><button>Solicitações Confirmadas</button></a><br><br>
       <!-- <a href="slofinalizada.php"><button>Solicitações Finalizadas</button></a><br><br> -->
        <a href="escolher.php"><button>Agendar</button></a><br><br>
        <form action="../../Controller/UserController.php" method="post" name="menu">
            <button id="sair" name="sair">Sair</button>
        </form>

    </div>

</body>
</html>