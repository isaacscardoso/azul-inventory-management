<?php

$results = '';

if (isset($products)) {
    foreach ($products as $product) {
        $results .= /** @lang text */
            '<tr>
                <td>' . $product->id . '</td>
                <td>' . $product->nome . '</td>
                <td>' . $product->sku . '</td>
                <td>' . 'R$ ' . $product->preco . '</td>
                <td>' . $product->estoque . '</td>
                <td>' . date('d/m/Y - H:i:s', strtotime($product->data_postagem)) . '</td>
                <td>' . date('d/m/Y - H:i:s', strtotime($product->data_modificacao)) . '</td>
                <td>
                    <a href="edit.php?id=' . $product->id.'" style="text-decoration: none">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                    <a href="delete.php?id=' . $product->id.'">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>
             </tr>';
    }
}

?>

<main>
    <section>
        <a href="register.php">
            <button class="btn btn-success">Adicionar Produto</button>
        </a>
    </section>
    <section>
        <table class="table bg-light mt-3 table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>PRODUTO</th>
                <th>SKU</th>
                <th>PREÇO</th>
                <th>ESTOQUE</th>
                <th>DATA DE POSTAGEM</th>
                <th>DATA DE MODIFICAÇÃO</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?= $results ?>
            </tbody>
        </table>
    </section>
</main>
<!-- body -->
<!-- footer -->