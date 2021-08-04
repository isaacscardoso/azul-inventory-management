<?php

$message = '';
if (isset($_GET['status'])) {
    $message = match ($_GET['status']) {
        'success' => '<div class="alert alert-success">Ação executada com sucesso!</div>',
        'error' => '<div class="alert alert-danger">Ação não executada!</div>',
    };
}
$results = '';

if (isset($products)) {
    foreach ($products as $product) {
        $results .= /** @lang text */
            '<tr>
                <td>' . $product->nome . '</td>
                <td>' . $product->sku . '</td>
                <td>' . 'R$ ' . $product->preco . '</td>
                <td>' . $product->estoque . '</td>
                <td>' . date('d/m/Y - H:i:s', strtotime($product->data_postagem)) . '</td>
                <td>' . date('d/m/Y - H:i:s', strtotime($product->data_atualizacao)) . '</td>
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

$results = strlen($results) ? $results : /** @lang text */
            '<tr>
                <td colspan="8" class="text-center">
                    Nenhum Produto encontrado!
                </td>
             </tr>'

?>

<main>
    <?=$message?>
    <section>
        <a href="register.php">
            <button class="btn btn-success">Adicionar Produto</button>
        </a>
    </section>
    <section>
        <table class="table bg-light mt-3 table-hover">
            <thead>
            <tr>
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