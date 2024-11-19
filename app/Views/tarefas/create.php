<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Nova Tarefa</h1>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('tarefas/create') ?>" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="nome" name="nome" required minlength="3" maxlength="100">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required minlength="3" maxlength="255" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="frequencia" class="form-label">Frequência</label>
                <select class="form-select" id="frequencia" name="frequencia" required>
                    <option value="">Selecione a frequência</option>
                    <option value="diaria">Diária</option>
                    <option value="semanal">Semanal</option>
                    <option value="quinzenal">Quinzenal</option>
                    <option value="mensal">Mensal</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_programada" class="form-label">Data Programada</label>
                <input type="date" class="form-control" id="data_programada" name="data_programada" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">Selecione o status</option>
                    <option value="pendente">Pendente</option>
                    <option value="concluida">Concluída</option>
                    <option value="atrasada">Atrasada</option>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
                <a href="<?= base_url('tarefas') ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
