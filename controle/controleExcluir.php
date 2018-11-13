<?php
    include '../config/conexao.php';
    include '../config/variaveisControladoras.php';
    include '../funcoes/formularios.php';
    include '../funcoes/tabelas.php';

    $cpatribuicao = $_POST['cpatribuicao']; 

    $SQL = "DELETE FROM PROGRAMACAO WHERE cpatribuicao = '".$cpatribuicao."'";
    
    
    
    
    
    
    
    
    
    
    echo $resultado; /*Devolução para o AJAX.*/


?>