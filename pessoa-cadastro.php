<?php

require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\PessoaRepository;
use \AdminLte\Repository\TarefaRepository;

$pessoaRepository = new PessoaRepository();
$tarefaRepository = new TarefaRepository();



$tarefas = $tarefaRepository->listar();

$mensagem = null;

if ($_POST) {

    $update = $pessoaRepository->criar(
        $_POST['nome'],
        $_POST['sobrenome'],
        (int) $_POST['tarefa']
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
        <h3 class="card-title">Pessoa Cadastro</h3>
    </div>

    <form class="form-horizontal" method="post" action="/?pagina=pessoa-cadastro">

        <?php include "mensagem.php"; ?>

        <div class="card-body">
            <div class="form-group row">
                <label for="inputNome3" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNome3" required="required" placeholder="Nome" name="nome" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="Sobrenome" class="col-sm-2 col-form-label">Sobrenome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Sobrenome" required="required" placeholder="Sobrenome" name="sobrenome" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="tarefa" class="col-sm-2 col-form-label">Tarefas</label>
                <div class="col-sm-10">
                    <select name="tarefa" class="form-control" required="required" id="tarefa">
                        <option>Selecione uma Tarefa</option>
                        <?php foreach ($tarefas as $tarefa) { ?>
                            <option value="<?php echo $tarefa['id']; ?>" title="<?php echo $tarefa['descricao']; ?>"><?php echo $tarefa['titulo']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Salvar</button>
            <a href="/?pagina=pessoas" type="submit" class="btn btn-default float-right">Voltar</a>
        </div>

    </form>
</div>
