$( document ).ready(function() {
    /**
     * JS responsavel em confirmar se realmente vai ser removido o item
     */
    $('.removerItem').click(function (){
        if (confirm("Deseja realmente remover este item?")) {
            return true;
        }

        return false;
    });

    /**
     * JS para formulario de contato
     */

    if ($('.cpf').length) {
        $('.cpf').mask('000.000.000-00', {reverse: true});
    }

    if ($('.telefone').length) {
        $('.telefone').mask('(00) 00000-0000');
    }


    $('.form-contato').submit(function () {
        $.ajax({
            url : "/contato-send.php",
            type : 'post',
            dataType: 'json',
            data : $('.form-contato').serializeArray(),
            beforeSend : function(){
                $(".botao-enviar").html("ENVIANDO...");
            }
        })
            .done(function(msg){
                if (msg.status == 'true') {
                    $('.mensagem-model-sucesso').html(msg.mensagem);
                    $('#modal-success').modal('show');
                    clearForms();
                } else {
                    $('.mensagem-model-erro').html(msg.mensagem);
                    $('#modal-danger').modal('show');
                }

                $(".botao-enviar").html("Enviar");

            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });

        return false;
    });

    function clearForms()
    {
        $(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
        $(':checkbox, :radio').prop('checked', false);
    }


    /**
     * JS para calculadora
     */

    $(".waves-effect").click(function () {

        var valorAtual = $('.calculator-screen').val();
        $('.calculator-screen').val(valorAtual+$(this).val());
    });

    $(".operator").click(function () {

        if ($(this).val() == '=') {
            resultado();
        } else {
            var valorAtual = $('.calculator-screen').val();
            $('.calculator-screen').val(valorAtual+$(this).val());
        }
    });

    $(".all-clear").click(function () {
        $('.calculator-screen').val('');
    });


    function resultado() {
        calculo = '';
        valor = $('.calculator-screen').val();

        for (var i=0; i < valor.length; i++) {
            calculo += valor[i];
        }

        $('.calculator-screen').val(eval(calculo));
    }


});
