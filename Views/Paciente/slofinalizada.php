<?php
session_start();

require_once("../../Database/Conexao.php");
require_once("../../Dao/UserDao.php");
require_once("../../Model/Profissional.php");
require_once("../../Model/Atendimento.php");
require_once("../../Model/Cliente.php");
require_once("../../Dao/AtendDao.php");
require_once("../../Model/Atendimento.php");

$profissional = new Profissional();
$prodao = new ClienteDao();

$cliente = new ClienteDao();

$atend = new Atendimento();
$atendao = new AtendimentoDao();

$atendimento = new Atendimento();

$login = new ClienteDao();

if (!$login->checkLogin()) {

    header("Location: ../login");
    echo "<script>
             alert('Faça o login!!');
           </script>";
}
?>

<script>
    function deletar() {
        ok = confirm("Tem certeza que deseja cancelar o agendamento?");
        if (ok) {
            return true;
        } else {
            return false;
        }
    }
</script>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Lista dos Profissionais </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style> 
body{
        background-color: #e5f9ff;
    }

    form {
        width: 30%;
        margin: 0 auto;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    input,
    select {
        width: 60%;
        height: 40px;
        border-radius: 5px;
        outline: none;
        margin-top: 5px;
        font-size: 13pt;
        border: 1px solid #000;
        font-size: 13pt;
    }

    label {
        font-size: 13pt;
    }

    textarea {
        width: 60%;
        height: 100px;
        resize: none;
        border: 1px solid #000;
        border-radius: 5px;
        font-size: 13pt;
    }

    button {
        margin: 0 auto;
        width: 110px;
        height: 50px;
        background-color:green;
        border-radius: 5px;
        border: 1px solid #000;
        font-size: 15pt;
       
    }

    #btn>a>button {
        width: 100%;
        height: 150px;
        font-size: 21pt;
        margin: 0 auto;
       
    }

    #btn {
        margin: 0 auto;
        width: 30%;
        margin-top: 15%;
    }

    .voltar {
        font-size: 13pt;
    }

    table {
        width: 60%;
        border: #000 0px solid;
        text-align: left;
        margin-top: 10%;
        border-collapse: collapse;
    }

    tr {
        border-bottom: #000 1px solid;
    }

    #agendarC {
        width: 80px;
        height: 40px;
        font-size: 13pt;
        border: 1px solid #000;
        margin-top: 5px;
        margin-bottom: 5px;
        background-color: #bebebe;
    }

    #voltar{
        background-color: #c4c4c4;
        border-radius: 90px;
        border: none;
        cursor: pointer;
        margin-top: 5%;
        margin-left: 46%;
        margin-bottom: 5%;
        color: #000;
    }

    #voltar:hover{
        box-shadow: 0 0 6px #454545;
    }

    img{
        width: 200px;
        margin-left: 45%;
    }
</style>
</head>

<body>
<!--
Disabled você não pode editar nem obter o valor do input ao processar o Form.

Readonly você pode pelo menos pegar o valor do input no processamento do Form. -->

<img src="../../img/CONECTA.png" alt="">

 <h2 align="center">Envie um Feedback</h2>
  

        <?php foreach ($atendao->finalizar() as $atend) : ?>
            <form action="../../Controller/AtendController.php" method="post" name="a">
            <label>Nome do Cuidador</label></br>
                <input type="hidden" id="id_a" name="id_a" value="<?= $atend->getIDA() ?>"/>
                <input type="hidden" id="id_e" name="id_e" value="<?= $atend->getID() ?>">
                <input value="<?= $atend->getNome() ?>" readonly="readonly"></input></br>
                <label>De uma nota para o cuidador</label></br>
                <select id="estrela" name="estrela"></br>
                    <option value="" selected="selected" required>--Selecione--</option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                </select></br></br>
                <button id="nota" name="nota" value="<?= $atend->getID() ?>">Enviar</button>
            </form>
             
                <?php endforeach ?>
           

            <a href="./Menu.php"><button id="voltar">Voltar</button></a>

</body>

</html>