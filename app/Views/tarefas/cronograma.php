<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Cronograma de Tarefas</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Tarefa</th>
                                <th>Frequência</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $currentDate = null;
                            foreach ($tarefas as $tarefa): 
                                $taskDate = date('d/m/Y', strtotime($tarefa['data_programada']));
                            ?>
                                <?php if ($currentDate !== $taskDate): ?>
                                    <tr class="table-secondary">
                                        <td colspan="5"><strong><?= $taskDate ?></strong></td>
                                    </tr>
                                    <?php $currentDate = $taskDate; ?>
                                <?php endif; ?>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                        <strong><?= esc($tarefa['nome']) ?></strong>
                                        <br>
                                        <small class="text-muted"><?= esc($tarefa['descricao']) ?></small>
                                    </td>
                                    <td><?= ucfirst($tarefa['frequencia']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= $tarefa['status'] === 'concluida' ? 'success' : ($tarefa['status'] === 'atrasada' ? 'danger' : 'warning') ?>">
                                            <?= ucfirst($tarefa['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('tarefas/edit/' . $tarefa['id']) ?>" class="btn btn-sm btn-info">Editar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
