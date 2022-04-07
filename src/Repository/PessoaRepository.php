<?php

namespace AdminLte\Repository;

class PessoaRepository extends Conexao
{

    protected $table = 'pessoa';

    /**
     * @param $nome
     * @param $sobrenome
     * @param $tarefa
     * @return int
     */
    public function criar($nome, $sobrenome, $tarefa) {
        return self::create(
            "INSERT INTO {$this->table} (nome, sobrenome, tarefa) VALUES (:nome, :sobrenome, :tarefa)",
            array(
                ":nome" => $nome,
                ":sobrenome" => $sobrenome,
                ":tarefa" => $tarefa
            )
        );
    }

    /**
     * @param $id
     * @param $nome
     * @param $sobrenome
     * @param $tarefa
     * @return int
     */
    public function atualizar($id, $nome, $sobrenome, $tarefa) {
        return self::update(
            "UPDATE {$this->table} SET nome = :nome, sobrenome = :sobrenome, tarefa = :tarefa where id = :id",
            array(
                ":id" => $id,
                ":nome" => $nome,
                ":sobrenome" => $sobrenome,
                ":tarefa" => $tarefa
            )
        );
    }

    /**
     * @return array|false|null
     */
    public function listar() {
        return self::all('SELECT a1.id as idPessoa, a1.*, a.* FROM '.$this->table. ' as a1 JOIN atividade as a ON a.id = a1.tarefa ORDER BY a1.id');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getId($id) {
        return self::getQueryId('SELECT * FROM '.$this->table.' where id = :id', $id);
    }

    /**
     * @param $id
     * @return int|void
     */
    public function deletar($id) {
        return self::delete("DELETE FROM {$this->table} where id = :id", $id);
    }
}