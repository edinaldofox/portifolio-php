<?php

require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\TarefaRepository;

$tarefaRepository = new TarefaRepository();


$mensagem = null;

if ($_POST) {

    $update = $tarefaRepository->criar(
        $_POST['titulo'],
        $_POST['descricao']
    );

    $mensagemAcao = $update ? 'true' : 'false';

    if ($mensagemAcao == 'true') {
        $mensagem = 'Dados salvos com sucesso';
    } else {
        $mensagem = 'Dados salvos com sucesso';
    }

}

?>


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Contato</h3>
    </div>

    <form class="form-horizontal form-contato" method="post">

        <div id="area-mensagem">

        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="Nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Nome" required="required" placeholder="Nome" name="nome" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="Cpf" class="col-sm-2 col-form-label">Cpf</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control cpf" id="Cpf" required="required" placeholder="Cpf" name="cpf" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="Telefone" class="col-sm-2 col-form-label">Telefone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control telefone" id="Telefone" required="required" placeholder="Telefone" name="telefone" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Email" required="required" placeholder="Email" name="email" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="Descrição" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea name="descricao" placeholder="Informe aqui o motivo do seu contato" class="form-control" rows="12"></textarea>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info botao-enviar">Enviar</button>
            <a href="/" type="submit" class="btn btn-default float-right">Cancelar</a>
        </div>

    </form>
</div>



<div class="modal fade" id="modal-danger" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Alerta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mensagem-model-erro"></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>

</div>



<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h4 class="modal-title">Success Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mensagem-model-sucesso"></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>

</div>