<?php 
  /* -------------------------------------------------------------------------------
   * Inclusão das funções e recursos necessários.:
   * -------------------------------------------------------------------------------
   * * Acesso ao banco de dados.
   * * Acesso a váriaveis de controle do ambiente.
   * * Carregamento do cabeçalho.
   * -------------------------------------------------------------------------------
   */
   include '../config/conexao.php';
   include '../config/variaveisControladoras.php';
   include '../tela/cabecalho.php';
   include '../funcoes/formularios.php';
   
   #Início do Site, requisição da variavel controladora de telas 'opcao' via GET
   $opcao = ISSET($_GET['opcao'])?$_GET['opcao']:'default';


   # Switch parametrizado com requisição GET.
   # Nessa situação o usuário poderá cair em 5 itens diferentes além do default.
   # 1-INCLUIR;
   # 2-CONSULTAR;
   # 3-ALTERAR;
   # 4-EXCLUIR;
   # 5-LISTAR. 

   switch ($opcao)  {
      
        case 'default':  #Mensagem default do sistema. Apenas quando não houver get.
        echo "<div class='container'> 
             <br><h2>Atribuições...</h2><br>
             <h3>Descrição: " .$texto. "</h3>
             <h4>Autor: " .$autor_name. " </h4></div>";
        break;
    


        case 'incluir':
        criaForm("../controle/controleIncluir.php","Incluir Atribuição.:");
        /*Para incluir os dados de uma nova atribuição será necessário inserir (Regras)
         * 1-  Professor. (SELECT * FROM PROFESSORES)
         * 2-  Disciplina. (SELECT * FROM DISCIPLINAS)
         * 3-  QTD de Horas Aulas designadas.
         * 4-  Data em que será atribuido.
         * 5-  Registrar data de inserção.
         */ 
        #1.: Professor:
        $SQL = "SELECT CPPROFESSOR, TXNOMEPROFESSOR FROM PROFESSORES";
        $resultSQL = mysqli_query(conectaBD(), $SQL);
        criaCombo($resultSQL,"CPPROFESSOR","TXNOMEPROFESSOR","PROFESSOR","CPPROFESSOR");
        
        #2.: Disciplina:
        $SQL = "SELECT CPDISCIPLINA, TXNOME FROM DISCIPLINAS";
        $resultSQL = mysqli_query(conectaBD(), $SQL);
        criaCombo($resultSQL,"CPDISCIPLINA","TXNOME","DISCIPLINA","CPDISCIPLINA");

        #3.: QTD Horas:
        criaInputText("QTD HORAS","QTD_HORAS","Insira a quantidade de horas que serão atribuidas...");

        #4.: Data Atribuida:
        criaInputDate("DATA ATRIBUIÇÃO","DTATRIBUICAO");
        
        criarControleForm("Enviar","Limpar");
        terminaForm();
        break; #Fim da sessão de incluir.




        case 'consultar':
        criaForm("../controle/controleConsultar.php","Fazer uma consulta.:");
        echo "<h3>Você pode escolher entre os itens que deseja filtrar.:</h3>";
        #1.: Professor:
        $SQL = "SELECT CPPROFESSOR, TXNOMEPROFESSOR FROM PROFESSORES";
        $resultSQL = mysqli_query(conectaBD(), $SQL);
        criaComboNaoObrigatorio($resultSQL,"CPPROFESSOR","TXNOMEPROFESSOR","PROFESSOR","CPPROFESSOR");
        
        #2.: Disciplina:
        $SQL = "SELECT CPDISCIPLINA, TXNOME FROM DISCIPLINAS";
        $resultSQL = mysqli_query(conectaBD(), $SQL);
        criaComboNaoObrigatorio($resultSQL,"CPDISCIPLINA","TXNOME","DISCIPLINA","CPDISCIPLINA");

        #3.: QTD Horas:
        criaInputTextNaoObrigatorio("QTD HORAS","QTD_HORAS","Insira a quantidade de horas que serão atribuidas...");

        #4.: Data Atribuida:
        criaInputDateNaoObrigatorio("DATA ATRIBUIÇÃO","DTATRIBUICAO");
        
        #5.: Selects para ordenação (1 Para cada item)
        criaSelect("ORDENAÇÃO","TIPO_ORDEM");
          criaOption("Professores","cpprofessor");
          criaOption("Disciplinas","cpdisciplina");
          criaOption("Qtd. Horas","QThorasatribuidas");
          criaOption("Data Atribuida","dtAtribuicao");
          criaOption("Data Cadastro","dtcadatribuicao");
        terminaSelect(); #Função fecha tags de select.
        
        criarControleForm("Consultar","Limpar");
        terminaForm();
        break;

        case 'alterar':
        

   }

    ?>


</body>
</html>