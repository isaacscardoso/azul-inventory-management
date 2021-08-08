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
        <!-- se produto é virtual -->
        <div class="form-group">
            <div class="my-2">
                Produto Virtual ou Fisico
                <div>
                    <!-- fisico -->
                    <input type="radio" class="btn-check" name="virtual" id="virtual1" value="Fisico" autocomplete="off"
                           checked>
                    <label class="btn btn-outline-warning" for="virtual1">FISICO</label>
                    <!-- virtual -->
                    <input type="radio" class="btn-check" name="virtual" id="virtual2" value="Virtual" autocomplete="off">
                    <label class="btn btn-outline-info" for="virtual2">VIRTUAL</label>
                </div>
            </div>
        </div>
        <!-- estado de publicação -->
        <div class="form-group">
            <div class="my-2">
                <!-- publicado -->
                <label class="col-md-3">
                    Estado de Publicação do Produto
                    <select name="status" class="form-control">
                        <option value="Publicado" selected>Selecione...</option>
                        <option value="Publicado">Publicado</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Rascunho">Rascunho</option>
                    </select>
                </label>
            </div>
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