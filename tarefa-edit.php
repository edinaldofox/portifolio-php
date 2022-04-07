<?php

require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\TarefaRepository;

$tarefaRepository = new TarefaRepository();



$tarefa = $tarefaRepository->getId($_GET['id']);

$mensagem = null;

if ($_POST) {

    $update = $tarefaRepository->atualizar(
        (int) $_POST['id'],
        $_POST['titulo'],
        $_POST['descricao']
    );

    $mensagemAcao = $update ? 'true' : 'false';



    if ($mensagemAcao == 'true') {
        $mensagem = 'Dados salvos com sucesso';
    } else {
        $mensagem = 'Dados salvos com sucesso';
    }

    $tarefa = $tarefaRepository->getId($_GET['id']);
}

?>


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Tarefa Editar</h3>
    </div>
    <br>
    <div class="row">
        <div class="col-2">
            <a href="/?pagina=tarefa-remover&id=<?php echo $tarefa['id']; ?>" type="button" class="btn btn-block btn-danger removerItem">Remover Tarefa</a>
        </div>
        <div class="col-10"></div>

    </div>
    <br>
    <form class="form-horizontal" method="post" action="/?pagina=tarefa-edit&id=<?php echo $tarefa['id']; ?>">

        <?php include "mensagem.php"; ?>

        <div class="card-body">
            <div class="form-group row">
                <label for="Titulo" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Titulo" required="required" placeholder="Titulo" name="titulo" value="<?php echo $tarefa['titulo']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Descrição" class="col-sm-2 col-form-label">Descricao</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Descrição" required="required" placeholder="Descrição" name="descricao" value="<?php echo $tarefa['descricao']; ?>">
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Salvar</button>
            <a href="/?pagina=tarefas" type="submit" class="btn btn-default float-right">Voltar</a>
        </div>

    </form>
</div>
