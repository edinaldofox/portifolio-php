<?php



require __DIR__ . '/vendor/autoload.php';

use \AdminLte\Repository\PessoaRepository;

$pessoaRepository = new PessoaRepository();



$pessoaRepository->deletar($_GET['id']);


?>

<script>
    window.location.replace("/?pagina=pessoas&mensagem=Item removido com sucesso&mensagemAcao=true");
</script>
