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
        <h3 class="card-title">Tarefa Cadastro</h3>
    </div>

    <form class="form-horizontal" method="post" action="/?pagina=tarefa-cadastro">

        <?php include "mensagem.php"; ?>

        <div class="card-body">
            <div class="form-group row">
                <label for="Titulo" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Titulo" required="required" placeholder="Titulo" name="titulo" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="Descrição" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Descrição" required="required" placeholder="Descrição" name="descricao" value="">
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Salvar</button>
            <a href="/?pagina=tarefas" type="submit" class="btn btn-default float-right">Voltar</a>
        </div>

    </form>
</div>
