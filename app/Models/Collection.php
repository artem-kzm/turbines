<?php

namespace App\Models;

/**
 * Collection contains models and methods to work with them
 */
class Collection
{
    /**
     * @param Model[] $models
     */
    public function __construct(
        public array $models
    ) {}

    /**
     * @param Model[] $models
     */
    public static function create(array $models): static
    {
        return new static($models);
    }

    public function toArray(): array
    {
        $resultArray = [];
        foreach ($this->models as $model) {
            $resultArray[] = $model->toArray();
        }

        return $resultArray;
    }
}
