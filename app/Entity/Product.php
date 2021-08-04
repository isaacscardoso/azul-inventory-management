<?php

namespace App\Entity;

use App\Database\Database;
use PDO;

class Product
{
    /**
     * ID do produto
     * @var int
     */
    public int $id;

    /**
     * SKU do produto
     * @var string
     */
    public string $sku;

    /**
     * Nome do produto
     * @var string
     */
    public string $name;

    /**
     * Preço do produto
     * @var float
     */
    public float $price;

    /**
     * Quantidade em estoque do produto
     * @var int
     */
    public int $stock;

    /**
     * Data de postagem do produto
     * @var string
     */
    public string $postDate;

    /**
     * Data de modificação do produto
     * @var string
     */
    public string $atualizationDate;

    /**
     * Método responsável por listar todos os produtos do DB
     * @param string|null $where
     * @param string|null $order
     * @param string|null $limit
     * @return array
     */
    public static function getAllProducts(string $where = null, string $order = null, string $limit = null): array
    {
        return (new Database('produtos'))->select($where, $order, $limit)->fetchAll(
            PDO::FETCH_CLASS, self::class
        );
    }

    /**
     * Método responsável por buscar um produto por ID
     * @param integer $id
     * @return Product
     */
    public static function getProductById(int $id): Product
    {
        return (new Database('produtos'))->select(' id=' . $id)->fetchObject(
            self::class
        );
    }

    /**
     * Método responsável por cadastrar produtos no DB
     * @return bool
     */
    public function addProduct(): bool
    {
        // definir a data
        $this->postDate = date('Y-m-d H:i:s');
        $this->atualizationDate = date('Y-m-d H:i:s');

        // inserir o produto no DB
        $objDatabase = new Database('produtos');
        $this->id = $objDatabase->insert([
            'nome' => $this->name,
            'sku' => $this->sku,
            'preco' => $this->price,
            'estoque' => $this->stock
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar o produto no DB
     * @return boolean
     */
    public function updateProduct(): bool
    {
        return (new Database('produtos'))->update('id= ' . $this->id, [
            'nome' => $this->name,
            'sku' => $this->sku,
            'preco' => $this->price,
            'estoque' => $this->stock
        ]);
    }

    /**
     * Método responsável por excluir a vaga no DB
     * @return boolean
     */
    public function deleteProduct(): bool
    {
        return (new Database('produtos'))->delete('id = '.$this->id);
    }
}
