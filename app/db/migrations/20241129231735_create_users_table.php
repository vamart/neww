<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('users'); // Создаем таблицу "users"
        $table->addColumn('name', 'string', ['limit' => 255]) // Колонка "name" (строка, длина 255 символов)
            ->addColumn('email', 'string', ['limit' => 255]) // Колонка "email" (строка, длина 255 символов)
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP']) // Колонка "created_at" (время создания)
            ->create(); // Применяем создание таблицы
    }
}
