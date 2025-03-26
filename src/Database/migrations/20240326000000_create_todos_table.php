<?php

use Phinx\Migration\AbstractMigration;

class CreateTodosTable extends AbstractMigration
{
    public function change()
    {
        $this->table('todos')
            ->addColumn('title', 'string', ['limit' => 255])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('status', 'enum', ['values' => ['pending', 'completed'], 'default' => 'pending'])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
} 