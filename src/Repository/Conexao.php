<?php

namespace AdminLte\Repository;

use \PDO;
use \PDOException;

class Conexao
{

    /**
     * @return PDO
     */
    private function init()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=teste', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    /**
     * @param $query
     * @param $data
     * @return int
     */
    protected function create($query, $data)
    {

        try {
            $pdo = self::init();

            $stmt = $pdo->prepare($query);
            $stmt->execute($data);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    /**
     * @param $query
     * @param $data
     * @return int
     */
    protected function update($query, $data)
    {
        return $this->create($query, $data);
    }

    /**
     * @param $query
     * @return array|false|null
     */
    protected function all($query)
    {
        $pdo = self::init();

        $consulta = $pdo->query("$query");

        return $consulta->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    protected function getQueryId($query, $id)
    {
        $pdo = self::init();

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    protected function delete($query, $id)
    {
        try {
            $pdo = self::init();

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}