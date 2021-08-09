<?php

namespace App\Database;

class Pagination
{
    /**
     * Número máximo de registros por página
     * @var int
     */
    private int $limit;

    /**
     * Quantidade total de resultados do DB
     * @var int
     */
    private int $results;

    /**
     * Quantidade de páginas
     * @var int
     */
    private int $pages;

    /**
     * Página atual
     * @var int
     */
    private int $currentPage;

    /**
     * Construtor da classe
     * @param int $results
     * @param int $currentPage
     * @param int $limit
     */
    public function __construct(int $results, int $currentPage = 1, int $limit = 10)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Método responsável por calcular a paginação
     */
    private function calculate()
    {
        // Calcula o total de páginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        // Verifica se a página atual não excede o número de páginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Método responsável por retornar a cláusula Limit do SQL
     * @return string
     */
    public function getLimit(): string
    {
        $offset = ($this->limit * ($this->currentPage - 1));
        return $offset . ',' . $this->limit;
    }

    /**
     * Método responsável por retornar as opções de páginas disponíveis
     * @return array
     */
    public function getPages(): array
    {
        if ($this->pages == 1) return [];

        // paginas
        $pages = [];

        for ($i = 1; $i <= $this->pages; $i++) {
            $pages[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }

        return $pages;
    }
}
