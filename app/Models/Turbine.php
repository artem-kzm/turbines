<?php

namespace App\Models;

use App\Models\Contracts\DatabaseManager;
use App\Services\Database\CsvDatabaseManager;

/**
 * @property string id
 * @property string name
 * @property string producer
 * @property string coordinateN
 * @property string coordinateW
 */
class Turbine extends Model
{
    protected static function getDatabaseManager(): DatabaseManager
    {
        return new CsvDatabaseManager('turbines');
    }

    /**
     * @return string[]
     */
    public function address(): array
    {
        return [$this->coordinateN, $this->coordinateW];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'producer' => $this->producer,
            'coordinateN' => $this->coordinateN,
            'coordinateW' => $this->coordinateW,
        ];
    }
}
