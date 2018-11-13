<?php             
 /*
  * Esta página configura o cabeçaçalho do sistema e estará 
  * presente em todas as telas por meio de um include.
  * Sua manutenção é feita através das váriaveis de controle em ../config/variaveisControladoras.php 
  * Luis. 04/11/2018.
  */

 include '../config/variaveisControladoras.php';

 printf("
    <!DOCTYPE html>
    <head>
    <meta charset='UTF-8'>
    <!-- Exercício ILP -- Web Site em PHP deve funcionar como um CRUD.-->
    <title>ILP-PHP-ESSENCIAL</title>
    
    <!--JQUERY -->
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.7.1.js'></script>
    
    <!-- CDN PARA SWEET ALERT -->
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script> 

    


    <!-- Bootstrap CSS CDN de Acesso: -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    
   
    </head>
    <body>
    <!--Início da NAVBAR -->
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
    <div class='container'><!--Abre container (Garante alinhamento da navBar)-->
        <a class='navbar-brand h1 mb-0' href='../tela/home.php'>ILP 0210481713023</a>
        <div class='collapse navbar-collapse' id='navBarSite'>
            <ul class='navbar-nav'>
                <li class='nav-item'><a class='nav-link' href=".$link_item1.">".$item1."</a></li>
                <li class='nav-item'><a class='nav-link' href=".$link_item2.">".$item2."</a></li>
                <li class='nav-item'><a class='nav-link' href=".$link_item3.">".$item3."</a></li>
                <li class='nav-item'><a class='nav-link' href=".$link_item4.">".$item4."</a></li>
                <li class='nav-item'><a class='nav-link' href=".$link_item5.">".$item5."</a></li>
            </ul>
        </div>
    </div>
    </nav>");

?>