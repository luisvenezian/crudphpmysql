<?php             
 /*
  * Esta página configura o cabeçaçalho do sistema e estará 
  * presente em todas as telas por meio de um include.
  * Sua manutenção é feita através das váriaveis de controle em ../config/variaveisControladoras.php 
  * Luis. 04/11/2018.
  */
 ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset='UTF-8'>
    <!-- Sistema Crud para Administração de Empresa. -->
    <title>AdminS</title>
    
    <!--JQUERY -->
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.7.1.js'></script>
    
    <!-- CDN PARA SWEET ALERT -->
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script> 

    
    <!-- Bootstrap CSS CDN de Acesso: -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    
   
    </head>
    <body>


    <?php  include '../config/variaveisControladoras.php';

    echo
    "<nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
    <div class='container'><!--Abre container (Garante alinhamento da navBar)-->
        <a class='navbar-brand h1 mb-0' href='../tela/index.php'>
        <img src='https://img.icons8.com/color/48/000000/mind-map.png' width='30' height='30' class='d-inline-block align-top' alt=''>
        ".$nome_do_sistema."</a>
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
    </nav>";

    ?>