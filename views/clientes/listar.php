<?php ob_start(); ?>

<h2>Lista de Clientes</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data Cadastro</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente->id) ?></td>
                <td><?= htmlspecialchars($cliente->nome) ?></td>
                <td><?= htmlspecialchars($cliente->email) ?></td>
                <td><?= htmlspecialchars($cliente->telefone) ?></td>
                <td><?= htmlspecialchars($cliente->data_cadastro) ?></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="index.php?action=editar&id=<?= $cliente->id ?>">Editar</a>
                    <a class="btn btn-sm btn-danger" href="index.php?action=excluir&id=<?= $cliente->id ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
