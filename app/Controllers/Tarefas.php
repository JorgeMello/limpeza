<?php

namespace App\Controllers;

use App\Models\TarefaModel;
use CodeIgniter\RESTful\ResourceController;

class Tarefas extends ResourceController
{
    protected $tarefaModel;

    public function __construct()
    {
        $this->tarefaModel = new TarefaModel();
    }

    // Lista todas as tarefas
    public function index()
    {
        $data['tarefas'] = $this->tarefaModel->findAll();
        return view('tarefas/index', $data);
    }

    // Mostra o formulário de criação
    public function new()
    {
        return view('tarefas/create');
    }

    // Cria uma nova tarefa
    public function create()
    {
        $data = $this->request->getPost();
        
        if ($this->tarefaModel->save($data)) {
            return redirect()->to('/tarefas')->with('message', 'Tarefa criada com sucesso!');
        }

        return redirect()->back()->withInput()->with('errors', $this->tarefaModel->errors());
    }

    // Mostra o formulário de edição
    public function edit($id = null)
    {
        $data['tarefa'] = $this->tarefaModel->find($id);
        
        if (empty($data['tarefa'])) {
            return redirect()->to('/tarefas')->with('error', 'Tarefa não encontrada.');
        }

        return view('tarefas/edit', $data);
    }

    // Atualiza uma tarefa
    public function update($id = null)
    {
        $data = $this->request->getPost();
        
        if ($this->tarefaModel->update($id, $data)) {
            return redirect()->to('/tarefas')->with('message', 'Tarefa atualizada com sucesso!');
        }

        return redirect()->back()->withInput()->with('errors', $this->tarefaModel->errors());
    }

    // Remove uma tarefa
    public function delete($id = null)
    {
        if ($this->tarefaModel->delete($id)) {
            return redirect()->to('/tarefas')->with('message', 'Tarefa removida com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao remover tarefa.');
    }

    // Visualiza o cronograma
    public function cronograma()
    {
        $data['tarefas'] = $this->tarefaModel->orderBy('data_programada', 'ASC')->findAll();
        return view('tarefas/cronograma', $data);
    }
}
