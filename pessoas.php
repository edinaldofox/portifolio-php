<?php

require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\PessoaRepository;

$pessoaRepository = new PessoaRepository();

$pessoas = $pessoaRepository->listar();


if (!empty($_GET['mensagemAcao']) & !empty( $_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
    $mensagemAcao = $_GET['mensagemAcao'];
}

?>

<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pessoas</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a href="/?pagina=pessoa-cadastro" class="btn btn-block btn-success">Cadastrar Pessoa</a>
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
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Tarefa</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pessoas as $pessoa) { ?>
                    <tr>
                        <td><?php echo $pessoa['idPessoa']; ?></td>
                        <td><?php echo $pessoa['nome']; ?></td>
                        <td><?php echo $pessoa['sobrenome']; ?></td>
                        <td><?php echo $pessoa['titulo']; ?></td>
                        <td>
                            <a href="/?pagina=pessoa-edit&id=<?php echo $pessoa['id']; ?>" type="button" class="btn btn-block btn-info">Editar</a>
                        </td>
                    </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
