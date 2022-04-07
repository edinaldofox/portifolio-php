<?php



require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\TarefaRepository;

$tarefaRepository = new TarefaRepository();



$tarefaRepository->deletar($_GET['id']);


?>

<script>
    window.location.replace("/?pagina=tarefas&mensagem=Item removido com sucesso&mensagemAcao=true");
</script>
