<?php
    #Nesta sessão o usuário poderá filtrar por qualquer tipo de registro,
    #e poderá escolher uma ordenação para a tabela.
    #Luis 06/11/2018 00:47 ( :0 Aoô Viciado! )
    include '../config/conexao.php';
    include '../config/variaveisControladoras.php';
    include '../tela/cabecalho.php';
    include '../funcoes/formularios.php';
    include '../funcoes/tabelas.php';
    
    echo $js; #Inicia tag com funções de JS a serem utilizadas na tela.

    #Receber informações e inserir no banco de dados.
    #Requisições names: CPPROFESSOR, CPDISCIPLINA, QTD_HORAS, DTATRIBUICAO
    $CPPROFESSOR = ISSET($_REQUEST['CPPROFESSOR'])?$_REQUEST['CPPROFESSOR']:'0';
    $CPDISCIPLINA = ISSET($_REQUEST['CPDISCIPLINA'])?$_REQUEST['CPDISCIPLINA']:'0';
    $QTD_HORAS = ISSET($_REQUEST['QTD_HORAS'])?$_REQUEST['QTD_HORAS']:'0';
    $DTATRIBUICAO = ISSET($_REQUEST['DTATRIBUICAO'])?$_REQUEST['DTATRIBUICAO']:'0';
    $TIPO_ORDEM = ISSET($_REQUEST['TIPO_ORDEM'])?$_REQUEST['TIPO_ORDEM']:'0';

    if ($QTD_HORAS == '') $QTD_HORAS ='0';
    if ($DTATRIBUICAO == '') $DTATRIBUICAO ='0';

    /*
    #Este comando futuramente deve ser implementado em uma procedure.
    $SQL = "SELECT DISTINCT cpAtribuicao as 'Codigo Atribuição', Nome, Disciplina, HorasAula, 
    DATE_FORMAT(STR_TO_DATE(Atribuicao,'%Y-%m-%d'),'%d/%m/%Y') As Atribuicao,
    DATE_FORMAT(STR_TO_DATE(Cadastro,'%Y-%m-%d'),'%d/%m/%Y') As Cadastro
    FROM PROGRAMACAO WHERE ( cpprofessor =".$CPPROFESSOR." OR ".$CPPROFESSOR."  = 0 ) 
    AND ( cpdisciplina=".$CPDISCIPLINA." OR ".$CPDISCIPLINA." = 0 )
    AND ( Atribuicao = '".$DTATRIBUICAO."' OR '".$DTATRIBUICAO."' = 0 ) 
    AND ( HorasAula = '".$QTD_HORAS."' OR '".$QTD_HORAS."' = 0 ) 
    ORDER BY ".$TIPO_ORDEM." DESC";
    */

    $SQL = "SELECT DISTINCT 
	a.cpatribuicao as 'Codigo Atribuição',
	p.txNomeProfessor as Nome,
    d.txNome as Disciplina,
    a.QThorasatribuidas as HorasAula,
    DATE_FORMAT(STR_TO_DATE(a.dtAtribuicao ,'%Y-%m-%d'),'%d/%m/%Y') As 'Atribuição',
    DATE_FORMAT(STR_TO_DATE(a.dtcadatribuicao,'%Y-%m-%d'),'%d/%m/%Y') As Cadastro
    FROM atribuicoes A 
		INNER JOIN professores p on p.cpprofessor = a.ceprofessor
        INNER JOIN disciplinas d on d.cpdisciplina = a.cedisciplina
    WHERE ( cpprofessor =".$CPPROFESSOR." OR ".$CPPROFESSOR."  = 0 ) 
    AND ( cpdisciplina=".$CPDISCIPLINA." OR ".$CPDISCIPLINA." = 0 )
    AND ( a.dtAtribuicao  = '".$DTATRIBUICAO."' OR '".$DTATRIBUICAO."' = 0 ) 
    AND ( a.QThorasatribuidas = '".$QTD_HORAS."' OR '".$QTD_HORAS."' = 0 ) 
    ORDER BY ".$TIPO_ORDEM." DESC";

    #echo "<h6>".$SQL."</h6>";
    
    #Função que exibe tabela de acordo com instrução $SQL desejada na tela.
    mostrarTabelaAlteravel($SQL,conectaBD(), $CPPROFESSOR, $CPDISCIPLINA,  $QTD_HORAS, $DTATRIBUICAO, $TIPO_ORDEM);
    

