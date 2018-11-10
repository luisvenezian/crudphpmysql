<?php

    include '../config/conexao.php';
    include '../config/variaveisControladoras.php';
    include '../tela/cabecalho.php';
    include '../funcoes/formularios.php';
    include '../funcoes/tabelas.php';
    
    #Receber informações e inserir no banco de dados.
    #Requisições names: CPPROFESSOR, CPDISCIPLINA, QTD_HORAS, DTATRIBUICAO
    $CPPROFESSOR = ISSET($_REQUEST['CPPROFESSOR'])?$_REQUEST['CPPROFESSOR']:'erro';
    $CPDISCIPLINA = ISSET($_REQUEST['CPDISCIPLINA'])?$_REQUEST['CPDISCIPLINA']:'erro';
    $QTD_HORAS = ISSET($_REQUEST['QTD_HORAS'])?$_REQUEST['QTD_HORAS']:'erro';
    $DTATRIBUICAO = ISSET($_REQUEST['DTATRIBUICAO'])?$_REQUEST['DTATRIBUICAO']:'erro';



    # * * * Foi realizada uma manutenção na estrutura da tabela  atribuicoes
    # Para que a mesma pudesse registrar informções de PK com auto_increment. 
    # TRUNCATE TABLE atribuicoes;
    # ALTER TABLE atribuicoes MODIFY COLUMN cpatribuicao INT NOT NULL PRIMARY KEY AUTO_INCREMENT ;
    # E reenseri valores padrão: 
    # INSERT INTO atribuicoes (ceprofessor, cedisciplina, qthorasatribuidas, dtatribuicao, dtcadatribuicao)
    # VALUES (2,2,10,'2018-01-01','2018-11-04'),(1,	1,180,'2010-01-15','2017-10-20'),(1,2,180,'2010-01-15','0000-00-00')
    # Luis. 4/11/2018. 

    #Atribui comando SQL de inserção de dados na tabela a variável.
    
    $SQL = "INSERT INTO atribuicoes (ceprofessor, cedisciplina, qthorasatribuidas, dtatribuicao, dtcadatribuicao)
            VALUES ('".$CPPROFESSOR."','".$CPDISCIPLINA."','".$QTD_HORAS."','".$DTATRIBUICAO."',CAST(NOW() AS DATE))"; 

    #Se a inserção ocorrer corretamente, mostrar dados.
    if (mysqli_query(conectaBD(), $SQL)) {
        echo "<h1 class='container'>Registro inserido com sucesso!</h1>";
        echo "<script type='text/javascript' >swal('Registrado!', 'Nova atribuição designada com sucesso!', 'success');</script>"; 
        sleep(1);
        #Foi criada uma view para facilitar o acesso a informação do relatório.
        #Segue script para gera-lo. 
        /*
         * CREATE VIEW PROGRAMACAO AS
         * SELECT p.txNomeProfessor as Nome,
         * d.txNome as Disciplina,
         * a.QThorasatribuidas as HorasAula,
         * a.dtAtribuicao as Atribuicao,
         * a.dtcadatribuicao as Cadastro
         * FROM atribuicoes A 
		 * INNER JOIN professores p on p.cpprofessor = a.ceprofessor
         * INNER JOIN disciplinas d on d.cpdisciplina = a.cedisciplina;
         */
        $SQL = "SELECT DISTINCT Nome, Disciplina, HorasAula, Atribuicao, Cadastro 
                FROM PROGRAMACAO WHERE cpprofessor =".$CPPROFESSOR." and cpdisciplina=".$CPDISCIPLINA."
                and Atribuicao = '".$DTATRIBUICAO."'";
        mostrarTabela($SQL,conectaBD());

          
    }
    else {
        echo "<script type='text/javascript' >swal('Erro!');</script>";
    }
    

