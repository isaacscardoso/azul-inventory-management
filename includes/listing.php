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
                <td>' . $product->tipo . '</td>
                <td>' . $product->estado . '</td>
                <td>' . 'R$ ' . number_format($product->preco, 2, ",", ".") . '</td>
                <td>' . $product->estoque . '</td>
                <td>' . date('d/m/Y - H:i:s', strtotime($product->data_postagem)) . '</td>
                <td>' . date('d/m/Y - H:i:s', strtotime($product->data_atualizacao)) . '</td>
                <td>
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">    
                        <a href="edit.php?id=' . $product->id . '" style="text-decoration: none">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="delete.php?id=' . $product->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </div>
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
    <?= $message ?>
    <!-- botão add produto -->
    <section>
        <div class="d-grid gap-1 d-md-flex">
            <a href="register.php">
                <button class="btn btn-success">Adicionar Produto</button>
            </a>
        </div>
    </section>
    <!-- barra pesquisa -->
    <section>
        <form method="get">
            <div class="row my-3">
                <!-- barra de pesquisa -->
                <div class="col">
                    <label for="search">Buscar por Produto</label>
                    <input type="text" name="search" id="search" class="form-control"
                           placeholder="Pesquisar produto por nome"
                           value="<?= $search ?? '' ?>">
                </div>
                <!-- filtrar por virtual / fisico -->
                <div class="col">
                    <label for="filter">Tipo</label>
                    <select name="filter" id="filter" class="form-control">
                        <option value="">Selecione...</option>
                        <option value="Fisico" <?= ($filter ?? '') == 'Fisico' ? 'selected' : '' ?> >Fisico</option>
                        <option value="Virtual" <?= ($filter ?? '') == 'Virtual' ? 'selected' : '' ?> >Virtual</option>
                    </select>
                </div>
                <!-- filtrar por estado de publicação -->
                <div class="col">
                    <label for="publicationStatus">Estado de Publicação do Produto</label>
                    <select name="publicationStatus" id="publicationStatus" class="form-control">
                        <option value="">Selecione...</option>
                        <!-- publicado -->
                        <option value="Publicado" <?= ($publicationStatus ?? '') == 'Publicado' ? 'selected' : '' ?> >
                            Publicado
                        </option>
                        <!-- pendente -->
                        <option value="Pendente" <?= ($publicationStatus ?? '') == 'Pendente' ? 'selected' : '' ?> >
                            Pendente
                        </option>
                        <!-- rascunho -->
                        <option value="Rascunho" <?= ($publicationStatus ?? '') == 'Rascunho' ? 'selected' : '' ?> >
                            Rascunho
                        </option>
                    </select>
                </div>
                <!-- botão pesquisar -->
                <div class="col d-md-flex align-items-end ">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>
    </section>
    <!-- tabela de produtos -->
    <section>
        <table class="table bg-light mt-3 table-hover">
            <thead>
            <tr>
                <th>PRODUTO</th>
                <th>SKU</th>
                <th>TIPO</th>
                <th>ESTADO</th>
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