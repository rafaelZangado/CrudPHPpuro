<?php ob_start(); ?>

<h2>Novo Cliente</h2>
<form method="post" action="index.php?action=criar">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?= $_POST['nome'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone" id="telefone" value="<?= $_POST['telefone'] ?? '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
