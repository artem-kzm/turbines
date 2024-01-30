<?php

namespace App\Models;

use App\Exceptions\IdDoesNotExistException;
use App\Exceptions\ModelNotFoundException;
use App\Models\Contracts\DatabaseManager;

abstract class Model
{
    private static DatabaseManager $databaseManager;
    private array $attributes;

    abstract protected static function getDatabaseManager(): DatabaseManager;
    abstract public function toArray(): array;

    /**
     * @throws ModelNotFoundException
     */
    public static function getById(int $id): static
    {
        try {
            $data = static::databaseManager()->getById($id);
        } catch (IdDoesNotExistException) {
            throw new ModelNotFoundException();
        }

        $turbine = new static();
        $turbine->setAttributes($data);

        return $turbine;
    }

    /**
     * @return Collection
     */
    public static function all(): Collection
    {
        $rows = static::databaseManager()->getAll();

        $turbines = [];
        foreach ($rows as $row) {
            $turbine = new static();
            $turbine->setAttributes($row);

            $turbines[] = $turbine;
        }

        return Collection::create($turbines);
    }

    public static function create(array $data): static
    {
        $attributes = static::databaseManager()->insert($data);

        $turbine = new static();
        $turbine->setAttributes($attributes);

        return $turbine;
    }

    public function update(array $data): void
    {
        static::databaseManager()->update($this->id, $data);
    }

    public function delete(): void
    {
        static::databaseManager()->delete($this->id);
    }

    public function __get(string $key): string
    {
        return $this->attributes[$key];
    }

    protected function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    private static function databaseManager(): DatabaseManager
    {
        static::$databaseManager = static::$databaseManager ?? static::getDatabaseManager();

        return static::$databaseManager;
    }
}
