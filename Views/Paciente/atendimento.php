<?
session_start();
?>
<style>
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
    width: 110px;
    height: 50px;
    border-radius: 5px;
    border: 1px solid #000;
    font-size: 15pt;
}

#btn > a > button{
    width: 100%;
    height: 150px;
    font-size: 21pt;
    margin: 0 auto;
}

#btn{
    margin: 0 auto;
    width: 30%;
    margin-top: 15%;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <img src="../../img/CONECTA.png" alt="">

    <h1 align="center">Agendamento</h1>
    <form action="../../Controller/AtendController.php" method="post" name="cad">
       <label>Informe a data e o horário para acompanhamento:</label><br>
        <input type="date" name="data_A" id="data_A" required>
        <input type="time" name="hora" id="hora" required><br><br>

        <!-- pegar da demanda -->

        <label> Selecione o principal motivo do acompanhamento: </label><br>
        <select name="tipo" id="tipo" required>
            <option value="1" selected="select">--SELECIONE--</option>
            <option value="2" > Controle de medicamentos </option>
            <option value="3" > Acompanhamento em consultas médicas </option>
            <option value="4" > Higiene e/ou alimentação </option>
            <option value="5" > Cuidados com idosos acamados </option>
        </select><br><br>


        <label>Alguma observação?</label><br>
        <textarea name="desc" id="desc" cols="30" rows="10" required></textarea><br><br><br>


       <button> <a href="escolher.php">Continuar</a></button><br><br><br>

      
    </br>   
        <input type="submit" id="agendar" name="agendar" value="a">
       
    </form>

    <a href="./Menu.php"><button id="voltar">Voltar</button></a>
   
</body>
</html>