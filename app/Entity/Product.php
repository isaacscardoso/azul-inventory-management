<?php

namespace App\Entity;

use App\Database\Database;

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
    public string $modificationDate;


    /**
     * Método responsável por cadastrar produtos no DB
     * @return bool
     */
    public function addProduct(): bool
    {
        // definir a data
        $this->postDate = date('Y-m-d H:i:s');
        $this->modificationDate = date('Y-m-d H:i:s');

        // inserir o produto no DB
        $objDatabase = new Database('produtos');
        $this->id = $objDatabase->insert([
            'nome' => $this->name,
            'sku' => $this->sku,
            'preco' => $this->price,
            'estoque' => $this->stock
        ]);

        echo "<prev>";
        print_r($this);
        echo "</prev>"; exit;

        return true;

    }
}
