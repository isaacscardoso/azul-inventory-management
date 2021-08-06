<main>
    <h2 class="mt-4"><?= TITLE ?></h2>
    <!-- formulário de cadastro de produtos -->
    <form method="post">
        <!-- nome do produto -->
        <div class="form-group">
            <label class="col-md-3">
                Nome
                <input type="text" class="form-control" name="name" autocomplete="false" required/>
            </label>
        </div>
        <!-- sku do produto -->
        <div class="form-group">
            <label class="col-md-3">
                SKU
                <input type="text" class="form-control" name="sku"/>
            </label>
        </div>
        <!-- preço do produto -->
        <div class="form-group">
            <label class="col-md-3">
                Preço
                <input type="number" class="form-control money" name="price" min="0.00" step="0.01" required/>
            </label>
        </div>
        <!-- estoque do produto -->
        <div class="form-group">
            <label class="col-md-3">
                Estoque
                <input type="number" class="form-control" name="stock" min="1" step="1" required/>
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