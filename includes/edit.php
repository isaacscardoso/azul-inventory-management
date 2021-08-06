<main>
    <h2 class="mt-4"><?= TITLE ?></h2>
    <!-- formulário de cadastro de produtos -->
    <form method="post">
        <!-- nome do produto -->
        <div class="form-group">
            <label class="col-md-3">
                Nome
                <input type="text" class="form-control" name="name" value="<?= $objProduct->nome ?>" required/>
            </label>
        </div>
        <!-- sku do produto -->
        <div class="form-group">
            <label class="col-md-3">
                SKU
                <input type="text" class="form-control" name="sku" value="<?= $objProduct->sku ?>"/>
            </label>
        </div>
        <!-- se produto é virtual -->
        <div class="form-group">
            <label class="col-md-3">
                Virtual
                <input type="text" class="form-control" name="virtual" value="<?= $objProduct->tipo ?>">
            </label>
        </div>
        <!-- estado de publicação -->
        <div class="form-group">
            <label class="col-md-3">
                Estado
                <input type="text" class="form-control" name="status" value="<?= $objProduct->estado ?>">
            </label>
        </div>
        <!-- preço do produto -->
        <div class="form-group">
            <label class="col-md-3">
                Preço
                <input type="number" class="form-control money" name="price" min="0.00" step="0.01"
                       value="<?= $objProduct->preco ?>" required/>
            </label>
        </div>
        <!-- estoque do produto -->
        <div class="form-group">
            <label class="col-md-3">
                Estoque
                <input type="number" class="form-control" name="stock" min="1" step="1"
                       value="<?= $objProduct->estoque ?>"
                       required/>
            </label>
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