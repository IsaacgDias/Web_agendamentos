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
    <title> Lista dos agendamentos </title>
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

    table {
        width: 80%;
        height: 20%;
        border: #000 0px solid;
        text-align: left;
        margin: auto;
        margin-top: 10%;
        border-collapse: collapse;
    }

    tr {
        border-bottom: #000 1px solid;
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

<img src="../../img/CONECTA.png" alt="">

    <table>
        <tr style="height: 70px">

            <th>Paciente</th>
            <th>Sexo</th>
            <th>Cep</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Numero</th>
            <th>Complemento</th>
            <th>Turno</th>
            <th>Motivo</th>
            
          
        </tr>

        <?php foreach ($atendao->PedidosAndamento() as $atend) : ?>
            <?php
               
                ?>
            <tr>
                <td><?= $atend->getNome() ?></td>
                <td><?= $atend->getSexo() ?></td>
                <td><?= $atend->getCep() ?></td>
                <td><?= $atend->getBairro() ?></td>
                <td><?= $atend->getRua() ?></td>
                <td><?= $atend->getNumero() ?></td>
                <td><?= $atend->getComplemento() ?></td>
                <td><?= $atend->getTurno() ?></td>
                <td><?= $atend->getObs() ?></td>


                <td style="text-align:center;">
                   <!-- <form action="../../Controller/AtendController.php" method="post" name="del">
                

                        <input type="submit" id="Confirmar" name="confirmar" value="Confirmar" class="inpu" style="margin-bottom:-5px; width:197%; background-color:#008000; color: #fff;" onclick="return cancelar()" />
                    </form> -->
                </td>

            </tr>
    
            <?php endforeach ?> 
    </table>

    <a href="./funcionario.html"><button id="voltar">Voltar</button></a>

</body>

</html>