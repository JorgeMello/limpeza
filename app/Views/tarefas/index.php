<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Lista de Tarefas</h1>

<div class="mb-3">
    <a href="<?= base_url('tarefas/new') ?>" class="btn btn-primary">Nova Tarefa</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Frequência</th>
                <th>Data Programada</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tarefas as $tarefa): ?>
            <tr>
                <td><?= esc($tarefa['nome']) ?></td>
                <td><?= esc($tarefa['descricao']) ?></td>
                <td><?= esc($tarefa['frequencia']) ?></td>
                <td><?= date('d/m/Y', strtotime($tarefa['data_programada'])) ?></td>
                <td>
                    <span class="badge bg-<?= $tarefa['status'] === 'concluida' ? 'success' : ($tarefa['status'] === 'atrasada' ? 'danger' : 'warning') ?>">
                        <?= ucfirst($tarefa['status']) ?>
                    </span>
                </td>
                <td>
                    <a href="<?= base_url('tarefas/edit/' . $tarefa['id']) ?>" class="btn btn-sm btn-info">Editar</a>
                    <form action="<?= base_url('tarefas/delete/' . $tarefa['id']) ?>" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
