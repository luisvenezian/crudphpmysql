<?php
<<<<<<< HEAD
    /*
     * A pagina trabalha para a requisão ajax do arquivo js.js
     * deletando o arquivo solicitado pelo usuário e respondendo-o
     * com uma tabela atualizada sem necessidade de atualizar 'f5' a página
     */
=======
    include '../config/conexao.php';
    include '../config/variaveisControladoras.php';
    include '../funcoes/formularios.php';
    include '../funcoes/tabelas.php';
>>>>>>> 8adce357759d39be3ff11e8f344db0483e5917af

    $cpatribuicao = $_POST['cpatribuicao']; 

<<<<<<< HEAD
    include '../config/conexao.php';
    include '../config/variaveisControladoras.php';
    include '../funcoes/formularios.php';
    include '../funcoes/tabelas.php';


    $cpatribuicao = $_POST['cpatribuicao']; 
    #Os mesmos parâmetros utilizados para consultar devolverão o resultado.
    $CPPROFESSOR = $_POST['cpprofessor'];
    $CPDISCIPLINA = $_POST['cpdisciplina'];
    $QTD_HORAS = $_POST['qtd_horas'];
    $DTATRIBUICAO = $_POST['dtatribuicao'];
    $TIPO_ORDEM = $_POST['tipo_ordem'];


   
    $SQL = "DELETE FROM atribuicoes WHERE cpatribuicao = '".$cpatribuicao."'"; #Código PK.

    if (mysqli_query(conectaBD(), $SQL)) {
    $SQL = "SELECT DISTINCT cpAtribuicao as 'Codigo Atribuição', Nome, Disciplina, HorasAula, 
    DATE_FORMAT(STR_TO_DATE(Atribuicao,'%Y-%m-%d'),'%d/%m/%Y') As Atribuicao,
    DATE_FORMAT(STR_TO_DATE(Cadastro,'%Y-%m-%d'),'%d/%m/%Y') As Cadastro
    FROM PROGRAMACAO WHERE ( cpprofessor =".$CPPROFESSOR." OR ".$CPPROFESSOR."  = 0 ) 
    AND ( cpdisciplina=".$CPDISCIPLINA." OR ".$CPDISCIPLINA." = 0 )
    AND ( Atribuicao = '".$DTATRIBUICAO."' OR '".$DTATRIBUICAO."' = 0 ) 
    AND ( HorasAula = '".$QTD_HORAS."' OR '".$QTD_HORAS."' = 0 ) 
    ORDER BY ".$TIPO_ORDEM." DESC";

=======
    $SQL = "DELETE FROM PROGRAMACAO WHERE cpatribuicao = '".$cpatribuicao."'";
    
    
    
    
    
    
    
    
>>>>>>> 8adce357759d39be3ff11e8f344db0483e5917af
    
    echo "<script type='text/javascript' >swal('Deletado com sucesso!', '', 'success');</script>"; 
    sleep(1);

    
<<<<<<< HEAD
    #Função que exibe tabela de acordo com instrução $SQL desejada na tela.
    mostrarTabelaAlteravel($SQL,conectaBD(), $CPPROFESSOR, $CPDISCIPLINA,  $QTD_HORAS, $DTATRIBUICAO, $TIPO_ORDEM);
    }
    else {
        $resultado = "Erro ao deletar registro";
    }
=======
    echo $resultado; /*Devolução para o AJAX.*/

>>>>>>> 8adce357759d39be3ff11e8f344db0483e5917af

?>