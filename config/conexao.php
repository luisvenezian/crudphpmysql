<?php
/*
 * Sessão de conexão com o servidor e a base das informações 
 * que deverão ser utilizadas pelo sistema
 * Luis Felipe A. Venezian (22/10/2018).
 */
    


function conectaBD(){
    
    #Local do servidor
    $servidor = "localhost";
    
    #Usuário de acesso a base de dados 
     $usuario = "root";
 
    #Nome da instância em que deseja obter conexão.
    $base = "ilp"; 

    $link = mysqli_connect($servidor, $usuario,"", $base);
    return $link;
    
}


/*Fim de sessão.*/
?>