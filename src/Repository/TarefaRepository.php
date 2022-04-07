<?php

namespace AdminLte\Repository;

class TarefaRepository extends Conexao
{

    protected $table = 'atividade';

    /**
     * @param $titulo
     * @param $descricao
     * @return int
     */
    public function criar($titulo, $descricao) {
        return self::create(
            "INSERT INTO {$this->table} (titulo, descricao) VALUES (:titulo, :descricao)",
            array(
                ":titulo" => $titulo,
                ":descricao" => $descricao
            )
        );
    }

    /**
     * @param $id
     * @param $titulo
     * @param $descricao
     * @return int
     */
    public function atualizar($id, $titulo, $descricao) {
        return self::update(
            "UPDATE {$this->table} SET titulo = :titulo, descricao = :descricao where id = :id",
            array(
                ":id" => $id,
                ":titulo" => $titulo,
                ":descricao" => $descricao
            )
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getId($id) {
        return self::getQueryId('SELECT * FROM '.$this->table.' where id = :id', $id);
    }

    /**
     * @return array|false|null
     */
    public function listar() {
        return self::all('SELECT * FROM '.$this->table. ' ORDER BY ID');
    }

    /**
     * @param $id
     * @return int|void
     */
    public function deletar($id) {
        return self::delete("DELETE FROM {$this->table} where id = :id", $id);
    }

}