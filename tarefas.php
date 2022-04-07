<?php

require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\TarefaRepository;

$tarefaRepository = new TarefaRepository();

$tarefas = $tarefaRepository->listar();


if (!empty($_GET['mensagemAcao']) & !empty( $_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
    $mensagemAcao = $_GET['mensagemAcao'];
}

?>

<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tarefas</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a href="/?pagina=tarefa-cadastro" class="btn btn-block btn-success">Cadastrar Tarefa</a>
                    </div>
                </div>
            </div>
            <br>
            <?php include "mensagem.php"; ?>
            <br>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>titulo</th>
                        <th>descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tarefas as $tarefa) { ?>
                        <tr>
                            <td><?php echo $tarefa['id']; ?></td>
                            <td><?php echo $tarefa['titulo']; ?></td>
                            <td><?php echo $tarefa['descricao']; ?></td>
                            <td>
                                <a href="/?pagina=tarefa-edit&id=<?php echo $tarefa['id']; ?>" type="button" class="btn btn-block btn-info">Editar</a>
                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
