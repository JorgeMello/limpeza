<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTarefasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'frequencia' => [
                'type'       => 'ENUM',
                'constraint' => ['diaria', 'semanal', 'quinzenal', 'mensal'],
                'default'    => 'diaria',
            ],
            'data_programada' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pendente', 'concluida', 'atrasada'],
                'default'    => 'pendente',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tarefas');
    }

    public function down()
    {
        $this->forge->dropTable('tarefas');
    }
}
