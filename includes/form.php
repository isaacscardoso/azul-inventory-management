<main>
    <h2 class="mt-4"><?= TITLE ?></h2>
    <!-- formulário de cadastro de produtos -->
    <form method="post">
        <!-- nome do produto -->
        <div class="form-group col-md-3">
            <label>Nome</label>
            <input type="text" class="form-control" name="name" value="" required/>
        </div>
        <!-- sku do produto -->
        <div class="form-group col-md-3">
            <label>SKU</label>
            <input type="text" class="form-control" name="sku" value=""/>
        </div>
        <!-- preço do produto -->
        <div class="form-group col-md-3">
            <label>Preço</label>
            <input type="number" class="form-control money" name="price" min="0.00" step="0.01"
                   value="" required/>
        </div>
        <!-- estoque do produto -->
        <div class="form-group col-md-3">
            <label>Estoque</label>
            <input type="number" class="form-control" name="stock" min="1" step="1" value=""
                   required/>
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