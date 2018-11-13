    /*Estação de desenvolvimento de funções a serem empregadas no desenvolvimento do sistema*/    
    
    
    /*
     * Esta função (ouveValor) fica esperando um click do usuario na tela de consulta
     * em cima do icone de exclusão, ao clickar ele envia por meio do Ajax, o código
     * da atribuição que o usuário desejou excluir.
     * Luis Felipe, 12/11/2018
     */
    
    
    function ouveValor(clic) {
    //var div = document.getElementById('luis').innerHTML;
    var excluir = confirm('Deseja realmente excluir este registro? Código:'+ clic); // Alerta de confirme.
    var param = clic;
    if (excluir){
       // location.href='../controle/controleExcluir.php?cp_professor='+clic;
        
    
    var atribuicao = {
        "cpatribuicao" : param,
    };
    $.ajax({
        data:  atribuicao, /*Informação que será enviada pelo AJAX */
        url:   '/controle/controleExcluir.php', /*Arquivo que receberá a requisição */
        type:  'post', //Método
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { /*Retorno usado na controle que processa a exclusão do dado*/
                $("#resultado").html(response);
                alert('OK');
        }

        });
    
    }
    } 


