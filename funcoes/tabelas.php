<?php 

    # Pagina php responsável por registrar funções e ferramentas
    # para o desenvolvimento de tabelas no sistema.
    # Luis. 04/11/2018.
    
    #Mostra uma tabela com o resultado da select automaticamente
    function mostrarTabela($sql, $conexao){
    if (!$tabela=mysqli_query($conexao,$sql))
    echo "<script>swal('Erro ao criar conectar tabela!');</script>";
    
    $qtd_registro=mysqli_num_rows($tabela);
    
    if ($qtd_registro > 0) {
    $fields_num = mysqli_num_fields($tabela);
    
    echo "<div class='container'>\n";
    echo "<table class ='table  table-striped'><tr>\n";
    echo "<thead class='thead-light'>\n";
    echo "<tr>\n";
    #Header da Tabela é construido no for.
    for($i=0; $i<$fields_num; $i++){
        $field = mysqli_fetch_field($tabela);
        echo "<th scope='col'><b>".$field->name."</b></th>";
    }
    echo "</tr>\n"; #Fim do cabeçalho
    echo "</tread>\n"; #Primeira linha
    echo "<tbody>\n";
    #Dados tabela.
    while($linha = mysqli_fetch_row($tabela)){
        #Pega a linha como um array e as imprime dentro do for each.
        echo "<tr>";
        foreach($linha as $colunas) 
            echo "<td>$colunas</td>";
        
        echo "</tr>\n";
    }
    echo "</tbody>\n";
    echo "</table>\n";
    echo "</div>\n";
    }
    else { echo "<script>swal(' Tabela não possui registros :( ');</script>";}
    }
 
    #Mostra uma tabela com o resultado da select automaticamente
    #Com opção de UPDATE E DELETE.
    #Imagens seguem em diretório ../funcoes/img/ 
    function mostrarTabelaAlteravel($sql, $conexao){
    echo "<br>";
    if (!$tabela=mysqli_query($conexao,$sql))
    echo "<script>swal('Erro ao criar conectar tabela!');</script>";
    
    $qtd_registro=mysqli_num_rows($tabela);
    
    if ($qtd_registro > 0) {
    $fields_num = mysqli_num_fields($tabela);
    
    echo "<div class='container'>\n";
    echo "<table class ='table  table-striped table-bordered'><tr>\n";
    echo "<thead class='thead-light'>\n";
    echo "<tr>\n";
    #Header da Tabela é construido no for.
    for($i=0; $i<$fields_num; $i++){
        $field = mysqli_fetch_field($tabela);
        echo "<th scope='col'><b>".$field->name."</b></th>";
    }
    echo "<th scope='col'><b>Excluir</b></th>";
    echo "<th scope='col'><b>Alterar</b></th>";
    echo "</tr>\n"; #Fim do cabeçalho
    echo "</tread>\n"; #Primeira linha
    echo "<tbody>\n";
    #Dados tabela.
    while($linha = mysqli_fetch_row($tabela)){
        #Pega a linha como um array e as imprime dentro do for each.
        echo "<tr>";
        foreach($linha as $colunas) 
            echo "<td id='luis'>$colunas</td>";
        
        echo "<th scope='col' id='id1' onclick='ouveValor(".$linha[0].")'><img border='0' src='../funcoes/img/ic_delete.png' width='35' height='35'></th>";
        echo "<th scope='col' ><img border='0' src='../funcoes/img/ic_update.png' width='35' height='35'></th>";
        echo "</tr>\n";
    }
    echo "</tbody>\n";
    echo "</table>\n";
    echo "</div>\n";
    }
    else { echo "<script>swal(' Tabela não possui registros. ');</script>";}
    }   

   
    