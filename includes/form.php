<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-4"><?= TITLE ?></h2>
    <!-- formulário de cadastro de produtos -->
    <form method="post">
        <!-- nome do produto -->
        <div class="form-group col-md-3">
            <label>Nome</label>
            <input type="text" class="form-control" name="name" value="<?= $objProduct->nome ?>" required/>
        </div>
        <!-- sku do produto -->
        <div class="form-group col-md-3">
            <label>SKU</label>
            <input type="text" class="form-control" name="sku" value="<?= $objProduct->sku ?>"/>
        </div>
        <!-- preço do produto -->
        <div class="form-group col-md-3">
            <label>Preço</label>
            <input type="number" class="form-control money" name="price" min="0.00" step="0.01"
                   value="<?= $objProduct->preco ?>" required/>
        </div>
        <!-- estoque do produto -->
        <div class="form-group col-md-3">
            <label>Estoque</label>
            <input type="number" class="form-control" name="stock" min="1" step="1" value="<?= $objProduct->estoque ?>"
                   required/>
        </div>
        <!-- botão adicionar -->
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </form>
</main>
<!-- body -->
<!-- footer -->