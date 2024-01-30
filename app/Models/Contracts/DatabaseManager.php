<?php

namespace App\Models\Contracts;

interface DatabaseManager
{
    public function getById(int $id): array;
    public function getAll(): array;
    public function insert(array $data): array;
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
}
