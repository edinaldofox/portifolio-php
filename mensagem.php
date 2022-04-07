<?php

if (!empty($mensagemAcao)) {

    if ($mensagemAcao == 'true') {
        $alerta = <<<'item'
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
item;
        $alerta .= $mensagem . '</div>';

    } elseif ($mensagemAcao == 'false') {
        $alerta = <<<'item'
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
item;
        $alerta .= $mensagem . '</div>';

    }
}


if (!empty($alerta)) {

    if ($alerta) {
        $resultadoMensagem = '<div class="row">';
        $resultadoMensagem .= '<div class="col-12">';
        $resultadoMensagem .= $alerta;
        $resultadoMensagem .= '</div>';
        $resultadoMensagem .= '</div>';

        echo $resultadoMensagem;
    }
}