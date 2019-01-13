    /*Estação de desenvolvimento de funções a serem empregadas no desenvolvimento do sistema*/    
    
    
    /*
     * Esta função (ouveValor) fica esperando um click do usuario na tela de consulta
     * em cima do icone de exclusão, ao clicar ele envia por meio do Ajax, o código
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
    
    
    //Funções de JS Puro para mascaras nas inputs.
    //Link: https://pt.stackoverflow.com/questions/199264/como-faco-uma-mascara-para-um-input 
    
    function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
    }
    function fMascEx() {
        obj.value=masc(obj.value)
    }
    function mTel(tel) {
        tel=tel.replace(/\D/g,"")
        tel=tel.replace(/^(\d)/,"($1")
        tel=tel.replace(/(.{3})(\d)/,"$1)$2")
        if(tel.length == 9) {
            tel=tel.replace(/(.{1})$/,"-$1")
        } else if (tel.length == 10) {
            tel=tel.replace(/(.{2})$/,"-$1")
        } else if (tel.length == 11) {
            tel=tel.replace(/(.{3})$/,"-$1")
        } else if (tel.length == 12) {
            tel=tel.replace(/(.{4})$/,"-$1")
        } else if (tel.length > 12) {
            tel=tel.replace(/(.{4})$/,"-$1")
        }
        return tel;
    }
    function mCNPJ(cnpj){
        cnpj=cnpj.replace(/\D/g,"")
        cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
        cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
        cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
        cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
        return cnpj
    }
    function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
    }
    function mCEP(cep){
        cep=cep.replace(/\D/g,"")
        cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
        cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
        return cep
    }
    function mNum(num){
        num=num.replace(/\D/g,"")
        return num
    }


