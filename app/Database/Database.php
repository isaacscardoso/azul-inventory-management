<?php

namespace App\Database;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    /**
     * Host de conexão com o DB
     */
    const HOST = 'localhost';

    /**
     * Nome do DB
     */
    const NAME = 'azul';

    /**
     * Nome do usuário do banco
     */
    const USER = 'root';

    /**
     * Senha do banco de dados
     */
    const PASSW = '183729852456root';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private string $table;

    /**
     * Instância de conexão com o DB
     * @var PDO
     */
    private PDO $connection;

    /**
     * Define a tabela, instância e conexão
     * @param string|null
     */
    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o DB
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER,
                self::PASSW);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die('Error: ' . $exception->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco
     * @param array $values
     * @return integer
     */
    public function insert(array $values): int
    {
        // dados da query
        $fields = array_keys($values);

        // enésimas posições no array de acordo com enésimo tamanho de fields
        $binds = array_pad([], count($fields), '?');

        // monta a query
        $query = /** @lang text */
            'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') 
            VALUES (' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        // retorna o ID inserido
        return $this->connection->lastInsertId();
    }

    /**
     * Método responsável por executar queries dentro do DB
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute(string $query, array $params = []): PDOStatement
    {
        try {
            $statment = $this->connection->prepare($query);
            $statment->execute($params);
            return $statment;
        } catch (PDOException $exception) {
            die('Error: ' . $exception->getMessage());
        }
    }

    /**
     * Método responsável por executar uma consulta no DB
     * @param string|null $where
     * @param string|null $order
     * @param string|null $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select(string $where = null, string $order = null, string $limit = null,
                           string $fields = '*'): PDOStatement
    {
        // dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        // monta a query
        $query = /** @lang text */
            'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }

    /**
     * Método responsável por atualizar o produto no DB
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update(string $where, array $values): bool
    {
        // dados da query
        $fields = array_keys($values);

        // monta a query
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        // executa a querry
        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Método responsável por excluir dados no DB
     * @param string $where
     * @return boolean
     */
    public function delete(string $where): bool
    {
        // monta a query
        $query = /** @lang text */
            'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        // executa a query
        $this->execute($query);

        return true;
    }
}