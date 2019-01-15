<?php
    

   /*                                                                                           
    * Luis Felipe A. Venezian, 22/10/2018                                    
    * Funções servirão para criação de formulário, o intuito é
    * facilitar a manutenção do mesmo, criando um padrão de desenvolvimento.    
    *                                                                                                                 
    */ 
    echo $js; #Inicia tag com funções de JS a serem utilizadas na tela.


    function criaForm($pagina, $titulo){ # Var pagina indica o link de referência para o formulário.
        echo "<form method='POST' action = '".$pagina."' >\n";
        echo "<div class ='container'>\n"; #Classe container alinha informações (Bootstrap)
        echo "<div class= 'row'>
                <div class=col-lg>
                   <h4> ".$titulo." </h4>
                </div>
              </div>\n";
        #echo "<table class='table' align='center'>\n"; #Classe Table é referente ao uso do Bootstrap estilizando o conteúdo.
    }

    function terminaForm(){  
        echo "</table>";
        echo "</div>";
        echo "</form>\n";
    }

    function submitForm($texto){ #Var texto indica o que estará escrito no botão de submit.
        echo "<tr><td>'".$texto."'</td><td><input type='submit' value ='".$texto."'></td></tr>\n"; 
    }

    function BeginLine(){
        echo "<tr>\n";
    }
    function EndLine(){
        echo "</tr>\n";
    }

    function criaCombo($instrucao, $value, $dominio, $descricao, $name){
        /* Nesta função para criar combo as váriaveis se comportam da seguinte maneira:
         * $Instrução: Comando SQL para gerar os dados no combo.
         * $value: Value atribuido a option selecionada pelo usuário.
         * $dominio: Descrição do Value que será exibida no combo.
         * $descricao: Nome indicado a frente do combo.
         * $name: Name que ira guardar o value do option escolhido.
         */ 
        
        try {
            $Conexao = Conexao::getConnection();
            $query = $Conexao->query($instrucao);
            $resultado = $query->fetchALL();
        }
        catch (Exception $e){
            echo $e->getMessage();
            exit;
        }
        echo "<td><strong>".$descricao.": </strong></td><td><select class='form-control' name='".$name."'>\n";
        
        foreach($resultado as $resultado){
            echo "<option value = '".$resultado[$value]."'>".$resultado[$dominio]."</option>\n";
        }

        echo "</select></td>\n";
    }



    function criaInputText($descricao, $name, $placeHolder = ""){
        #O place holder é opcional.
        echo "<div class='row'>\n";
        echo "<div class='col-lg'>\n";
        echo "<strong>".$descricao."</strong></td><td><input type ='text' class='form-control' placeholder='".$placeHolder."' name = '".$name."' required>\n";
        echo "</div></div>\n";
    }

    function criaInputDate($descricao, $name){
        #O place holder é opcional.
        echo "<div class='row'>\n";
            echo "<div class='col-lg'>\n";
            echo "<strong>".$descricao."</strong><input type ='date' class='form-control' name = '".$name."' required>";
        echo "</div></div>\n";
    }

    #Funções de botão para inserção separados. Cada um em um TR.
    function criaBotaoLimpar(){
        echo "<tr><td><input type='reset' name='limpar' value='Limpar' class='btn-primary'></td></tr>";
    }

    function criaBotaoSubmit(){ 
        echo "<tr><td><input type='submit' name='Enviar' value='Enviar' class='btn-primary'></td></tr>";
    }

    #Função de botoões completa.
    function criarControleForm($nomeSubmit, $nomeReset){
        echo "<tr><td colspan='2'> <input type='submit' name='enviar' value='".$nomeSubmit."' class='btn-primary'>
              <input type='reset'  name='limpar' value='".$nomeReset."' class='btn-primary'>
        </td></tr>"; 
    }

    function criaComboNaoObrigatorio($instrucao, $value, $dominio, $descricao, $name){
        /* Nesta função para criar combo as váriaveis se comportam da seguinte maneira:
         * $Instrução: Comando SQL para gerar os dados no combo.
         * $value: Value atribuido a option selecionada pelo usuário.
         * $dominio: Descrição do Value que será exibida no combo.
         * $descricao: Nome indicado a frente do combo.
         * $name: Name que ira guardar o value do option escolhido.
         */ 
        echo "<tr><td><strong>".$descricao.": </strong></td><td><select class='form-control' name='".$name."'>\n";
        echo "<option selected value = 0>Nenhuma das Opções.</option>";
        while ($i=MYSQLI_FETCH_ARRAY($instrucao)){
            echo "<option value = '".$i[$value]."'>".$i[$dominio]."</option>\n";
        }

        echo "</select></td></tr>\n";
    }

    function criaInputTextNaoObrigatorio($descricao, $name, $placeHolder){
        #O place holder é opcional.
        echo "<tr><td><strong>".$descricao."</strong></td><td><input type ='text' class='form-control' placeholder='".$placeHolder."' name = '".$name."'></td></tr>";

    }

    function criaInputDateNaoObrigatorio($descricao, $name){
        #O place holder é opcional.
        echo "<tr><td><strong>".$descricao."</strong></td><td><input type ='date' class='form-control' name = '".$name."'></td></tr>";

    }
    function criaSelect($descricao, $name){
        echo "<tr><td><strong>".$descricao.": </strong></td><td><select class='form-control' name='".$name."'>\n";
    }
    function criaOption($descricao, $value){
        echo "<option value = '".$value."'>".$descricao."</option>\n";
    }
    function terminaSelect(){
        echo "</select></td></tr>\n";
    }

    function criaInputCPF($descricao, $name, $placeHolder = ""){
        #O place holder é opcional.
        echo "<tr><td><strong>".$descricao."</strong></td><td><input type ='text' class='form-control' 
        placeholder='".$placeHolder."' name = '".$name."' maxlength='14' onkeydown='javascript: fMasc( this, mCPF )' required></td></tr>";

    }


?>

