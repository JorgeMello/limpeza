<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Editar Tarefa</h1>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('tarefas/update/' . $tarefa['id']) ?>" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="nome" name="nome" required minlength="3" maxlength="100" 
                       value="<?= esc($tarefa['nome']) ?>">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required minlength="3" maxlength="255" 
                          rows="3"><?= esc($tarefa['descricao']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="frequencia" class="form-label">Frequência</label>
                <select class="form-select" id="frequencia" name="frequencia" required>
                    <option value="">Selecione a frequência</option>
                    <option value="diaria" <?= $tarefa['frequencia'] === 'diaria' ? 'selected' : '' ?>>Diária</option>
                    <option value="semanal" <?= $tarefa['frequencia'] === 'semanal' ? 'selected' : '' ?>>Semanal</option>
                    <option value="quinzenal" <?= $tarefa['frequencia'] === 'quinzenal' ? 'selected' : '' ?>>Quinzenal</option>
                    <option value="mensal" <?= $tarefa['frequencia'] === 'mensal' ? 'selected' : '' ?>>Mensal</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_programada" class="form-label">Data Programada</label>
                <input type="date" class="form-control" id="data_programada" name="data_programada" required 
                       value="<?= date('Y-m-d', strtotime($tarefa['data_programada'])) ?>">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">Selecione o status</option>
                    <option value="pendente" <?= $tarefa['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="concluida" <?= $tarefa['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
                    <option value="atrasada" <?= $tarefa['status'] === 'atrasada' ? 'selected' : '' ?>>Atrasada</option>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
                <a href="<?= base_url('tarefas') ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
