<?php 
  /* -------------------------------------------------------------------------------
   *   Inclusão das funções e recursos necessários.:
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
             <div class='row'>
             <div class='col-lg-8'><h3>" .$texto. "</h3></div>
             </div>
             <div class='row'>
             <div class='col-lg'><h5> ".$autor_name." </h5></div>
             </div>"
             ;
        break;
    



        case 'novo':
        criaform("../controle/controleNovoCadastro.php","Cadastro de Pessoa:");
        /* Aqui sera realizado um cadastro, seja de cliente, ou funcionário o procedimento será o mesmo 
        * 1- Tabela de Referência: [loja].[dbo].[tb_Cadastros]
        * 2- 'cad_' é usado como prefixo para todos names que serão recebidos, seguidos dos seus respectivos nomes de colunas no banco de dados. */
        criaInputText("Nome: ","cad_nome"); 
        criaInputText("Sobrenome: ","cad_sobrenome");
        criaInputCPF("CPF: ","cad_cpf");
        criaInputDate("Data de Nascimento: ", "cad_dt_nascimento");
        
        #Criando combo para estados
        BeginLine();
           $SQL = "SELECT nome, uf FROM [dbo].[tb_estados]";
           criaCombo($SQL, 'uf', 'nome','Estado','cad_uf');

           $SQL = "SELECT id, nome FROM [dbo].[tb_cidades]";
           criaCombo($SQL, 'id', 'nome','Cidade','cad_cidade',1);
        EndLine();
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
   }

    ?>


</body>
</html>