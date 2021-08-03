<?php

namespace App\Database;

use PDO;
use PDOException;

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
     * @var
     */
    private $table;

    /**
     * Instância de conexão com o DB
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela, instância e conexão
     * @param string
     */
    public function __construct(string $table)
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
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSW);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die('Error: ' . $exception->getMessage());
        }
    }

    /**
     *Método responsável por executar queries dentro do DB
     * @param string $query
     * @param array $params
     * @return \PDOStatement
     */
    public function execute(string $query, array $params =[])
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
     * Método responsável por inserir dados no banco
     * @param array $values
     * @return integer
     */
    public function insert(array $values)
    {
        // dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // monta a query
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        // retorna o ID inserido
        return $this->connection->lastInsertId();
    }
}