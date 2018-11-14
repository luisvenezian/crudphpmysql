    /*Estação de desenvolvimento de funções a serem empregadas no desenvolvimento do sistema*/    
    
    
    /*
     * Esta função (ouveValor) fica esperando um click do usuario na tela de consulta
     * em cima do icone de exclusão, ao clickar ele envia por meio do Ajax, o código
     * da atribuição que o usuário desejou excluir.
     * Luis Felipe, 12/11/2018
     */
    
    
    function ouveValor(clic,CPPROFESSOR,CPDISCIPLINA,QTD_HORAS,DTATRIBUICAO) {
    //var div = document.getElementById('luis').innerHTML;
    var excluir = confirm('Deseja realmente excluir este registro? Código:'+ clic); // Alerta de confirme.
    var param = clic;

    
    if (excluir){
       // location.href='../controle/controleExcluir.php?cp_professor='+clic;
      
    var atribuicao = {
        "cpatribuicao" : param,
        "cpprofessor" : CPPROFESSOR,
        "cpdisciplina": CPDISCIPLINA,
        "qtd_horas" :   QTD_HORAS,
        "dtatribuicao" :DTATRIBUICAO,
        "tipo_ordem" : 'cpprofessor'
    };
    $.ajax({
        data:  atribuicao, /*Informação que será enviada pelo AJAX */
        url:   '../controle/controleExcluir.php', /*Arquivo que receberá a requisição */
        type:  'post', //Método

        success:  function (response) { /*Retorno usado na controle que processa a exclusão do dado*/
                $("#tabela").html(response);
        }

        });
    }
    } 


