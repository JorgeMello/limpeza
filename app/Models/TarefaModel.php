<?php

namespace App\Models;

use CodeIgniter\Model;

class TarefaModel extends Model
{
    protected $table = 'tarefas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nome', 'descricao', 'frequencia', 'data_programada', 'status', 'created_at', 'updated_at'];

    // Datas que serão automaticamente gerenciadas
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validação
    protected $validationRules = [
        'nome' => 'required|min_length[3]|max_length[100]',
        'descricao' => 'required|min_length[3]|max_length[255]',
        'frequencia' => 'required|in_list[diaria,semanal,quinzenal,mensal]',
        'data_programada' => 'required|valid_date',
        'status' => 'required|in_list[pendente,concluida,atrasada]'
    ];
}
