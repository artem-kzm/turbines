<?php

use App\Models\Contracts\DatabaseManager;

/**
 * This is just a dummy class,
 * to show that you can use different types of databases
 */
class MysqlDatabaseManager implements DatabaseManager
{
    public function getById(int $id): array
    {
        // TODO: Implement getById() method.
    }

    public function getAll(): array
    {
        // TODO: Implement all() method.
    }

    public function insert(array $data): array
    {
        // TODO: Implement create() method.
    }

    public function update(int $id, array $data): void
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
