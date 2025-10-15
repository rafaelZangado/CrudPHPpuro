<?php ob_start(); ?>

<h2>Editar Cliente</h2>
<form method="post" action="index.php?action=editar&id=<?= $cliente->id ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?= htmlspecialchars($cliente->nome) ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($cliente->email) ?>" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone" id="telefone" value="<?= htmlspecialchars($cliente->telefone) ?>">
    </div>
    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
