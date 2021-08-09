<main>
    <h2 class="mt-4">Excluir Produto</h2>
    <!-- formulário de cadastro de produtos -->
    <form method="post">
        <!-- nome do produto -->
        <div class="form-group">
            <p>Confirmar exclusão do produto <strong><?= $objProduct->nome ?? '' ?></strong></p>
        </div>
        <!-- botão adicionar -->
        <div class="form-group mt-3">
            <a href="index.php" style="text-decoration: none">
                <button type="button" class="btn btn-primary">Cancelar</button>
            </a>
            <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>
<!-- body -->
<!-- footer -->