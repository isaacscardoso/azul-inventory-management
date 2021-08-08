<main>
    <h2 class="mt-4"><?= TITLE ?></h2>
    <!-- formulário de cadastro de produtos -->
    <form method="post">
        <!-- nome do produto -->
        <div class="form-group">
            <div class="col-md-3">
                <label for="name">Nome do Produto</label>
                <input type="text" id="name" class="form-control" name="name" value="<?= $objProduct->nome ?>"
                       required/>
            </div>
        </div>
        <!-- sku do produto -->
        <div class="form-group">
            <div class="col-md-3">
                <label for="sku">SKU</label>
                <input type="text" id="sku" class="form-control" name="sku" value="<?= $objProduct->sku ?>"/>
            </div>
        </div>
        <!-- se produto é virtual -->
        <div class="form-group">
            <div class="my-2">
                <label for="virtualStatus">Produto Físico / Virtual</label>
                <div id="virtualStatus">
                    <!-- fisico -->
                    <input type="radio" class="btn-check" name="virtual" id="virtual1" value="Fisico" checked>
                    <label class="btn btn-outline-warning" for="virtual1">FISICO</label>
                    <!-- virtual -->
                    <input type="radio" class="btn-check" name="virtual" id="virtual2"
                           value="Virtual" <?= $objProduct->tipo == 'Virtual' ? 'checked' : '' ?>>
                    <label class="btn btn-outline-info" for="virtual2">VIRTUAL</label>
                </div>
            </div>
        </div>
        <!-- estado de publicação -->
        <div class="form-group">
            <div class="my-2">
                <!-- publicado -->
                <div class="col-md-3">
                    <label for="publicationStatus">Estado de Publicação do Produto</label>
                    <select name="status" id="publicationStatus" class="form-control">
                        <option value="Publicado" selected>Selecione...</option>
                        <!-- publicado -->
                        <option value="Publicado" <?= $objProduct->estado == 'Publicado' ? 'selected' : '' ?> >
                            Publicado
                        </option>
                        <!-- pendente -->
                        <option value="Pendente" <?= $objProduct->estado == 'Pendente' ? 'selected' : '' ?> >
                            Pendente
                        </option>
                        <!-- rascunho -->
                        <option value="Rascunho" <?= $objProduct->estado == 'Rascunho' ? 'selected' : '' ?> >
                            Rascunho
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <!-- preço do produto -->
        <div class="form-group">
            <div class="col-md-3">
                <label for="price">Preço</label>
                <input type="number" id="price" class="form-control money" name="price" min="0.00" step="0.01"
                       value="<?= $objProduct->preco ?>"
                       required/>
            </div>
        </div>
        <!-- estoque do produto -->
        <div class="form-group">
            <div class="col-md-3">
                <label for="stock">Estoque</label>
                <input type="number" id="stock" class="form-control" name="stock" min="1" step="1"
                       value="<?= $objProduct->estoque ?>" required/>
            </div>
        </div>
        <!-- botões voltar e adicionar -->
        <div class="form-group mt-3">
            <a href="index.php" style="text-decoration: none">
                <button type="button" class="btn btn-primary">Voltar</button>
            </a>
            <button type="submit" class="btn btn-success"><?= TITLE_BUTTON ?></button>
        </div>
    </form>
</main>
<!-- body -->
<!-- footer -->