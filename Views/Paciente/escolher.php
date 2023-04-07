<?php
session_start();

require_once("../../Database/Conexao.php");
require_once("../../Dao/UserDao.php");
require_once("../../Model/Profissional.php");
require_once("../../Model/Atendimento.php");
require_once("../../Model/Cliente.php");

$profissional = new Profissional();
$prodao = new ClienteDao();

$cliente = new ClienteDao();


$atendimento = new Atendimento();

$login = new ClienteDao();

if (!$login->checkLogin()) {

    header("Location: ../login");
    echo "<script>
             alert('Faça o login!!');
           </script>";
}
?>




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
  
</head>
<style>
   body{
        background-color: #e5f9ff;
    }

    form {
        width: 40%;
        margin: 0 auto;
        margin-top: 5%;
        margin-bottom: 5%;
        align-items: center;
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
        margin: 0 auto;
        width: 70%;
        border: #000 0px solid;
        text-align: center;
        border-collapse: collapse;
        font-size: 13pt;
    }

    tr {
        border-bottom: #000 1px solid;
    }

    
    td{
        padding: 5px 30px 5px 5px;
        text-align: left;
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

    img {
        width: 80px;
        height: 80px;
    }

    #logo{
        width: 200px;
        height: 200px;
        margin-left: 45%;
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
</style>
<body>

<img id="logo" src="../../img/CONECTA.png" alt="">

    <form action="../../Controller/AtendController.php" method="post" name="cad1" class="col-4">
        <label>Escolha um turno:</label><br>
        <select name="turno" id="turno" required>
            <option name="opt" value="0" selected="select"> -- -- </option>
            <option name="opt2" value="1">Manhã, das 6h ás 12h</option>
            <option name="opt3" value="2">Tarde, das 12h ás 18h</option>
            <option name="opt4" value="3">Noite, das 18h ás 24h</option>
            <option name="opt5" value="4">Madrugada, das 0h as 6h</option>
        </select><br><br>

 

      

        <!-- pegar da demanda -->

        <label> Selecione o principal motivo do acompanhamento: </label><br>

        <select name="tipo" id="tipo" required>
            <option name="opt" value="0" selected="select"> -- -- </option>
            <option name="opt2" value="1">Controle de medicamentos </option>
            <option name="opt3" value="2">Acompanhamento em consultas médicas</option>
            <option name="opt4" value="3"> Higiene e/ou alimentação</option>
            <option name="opt5" value="4"> Cuidados com idosos acamados</option>
        </select><br><br>


        <label>Alguma observação?</label><br>
        <textarea name="desc" id="desc" cols="30" rows="10"></textarea><br><br><br>

        
    
        <table>
            
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Avaliações</th>
                <th style="padding:10px">Ações</th>
            </tr>
            <?php foreach ($prodao->listar() as $profissional) : ?>
                <tr>
                    <td><img src="../../img/<?= $profissional->getFoto() ?>" alt="<?= $profissional->getFoto() ?>" /></td>
                    <!-- <td><?php $profissional->getID() ?> </td> -->

                    <td><?= $profissional->getNome() ?></td>
                    <td><?= $profissional->getEmail() ?></td>
                    <td><?= $profissional->getTelefone() ?></td>
                    <td><?= $profissional->getAvaliacao()?></td>

                    <td style="text-align:center;">
                     
                        <button type="submit" id="d" name="d" value="<?= $profissional->getID() ?>" class="inpu" style="margin-bottom:-5px; width:95%; background-color:#092;" onclick="return agendar()">Selecionar</button>

                    </td>
                   
                </tr>
        
    
    
<?php endforeach ?>
</table>

</form>

<a href="./Menu.php"><button id="voltar">Voltar</button></a>
   

</body>

</html>