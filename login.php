<?php
session_start();
require_once('Database/Conexao.php');
require_once('Dao/UserDao.php');
require_once('Model/Cliente.php');
require_once('Model/Profissional.php');





?>

<style>
    body{
         background-color: #e5f9ff;
     }
     
     form{
         width: 30%;
         margin: 0 auto;
         margin-top: 1%;
         margin-left: 35%;
         align-items: center;
     }
     
     input{
         width: 60%;
         height: 50px;
         border-radius: 90px;
         outline: none;
         margin-top: 5px;
         font-size: 13pt;
         border: #000 solid 1px;
         padding-left: 2%;
     }
     
     label{
         font-size: 13pt;
     }
     
     button{
         margin: 0 auto;
         width: 90px;
         height: 60px;
         border-radius: 90px;
         border: 1px solid #000;
         background-color: #c4c4c4;
         border: none;
     }
     
     span{
         font-size: 13pt;
     }
     
     img{
         margin-left: 13%;
         width: 200px;
     }
     
     
     </style>
     
     </head>
     
     <body>
     
         <form action="Controller/UserController.php" method="post" name="entrar" class="col-5">
     
             <img src="img/CONECTA.png" alt="...">
             <br><br>
     
             <label>E-mail:</label><br>
             <input type="email" id="mail" name="mail" placeholder="E-mail" required>
             </br><br>
             <label>Senha:</label><br>
             <input type="password" id="senha" name="senha" placeholder="Senha">
             <br><br>
             <button type="submit" id="login" name="login" value="ENTRAR">ENTRAR</button><br><br>
     
     
             <span>Cadastrar como <a href="Views/Paciente/cadastro.html">paciente</a></span><br>
             <span>Cadastrar como <a href="Views/Funcionario/cadastroPro.html">profissional</a></span><br>
            
             
     
     
     
         </form>
     
     
     
     </body>
     
     </html>