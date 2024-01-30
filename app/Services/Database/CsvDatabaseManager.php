<?php

namespace App\Services\Database;

use App\Exceptions\IdDoesNotExistException;
use App\Models\Contracts\DatabaseManager;
use App\Services\Config;

class CsvDatabaseManager implements DatabaseManager
{
    public function __construct(
        private string $file
    ) {}

    /**
     * @throws IdDoesNotExistException
     */
    public function getById(int $id): array
    {
        $allRows = $this->getFileRows();
        $columnTitles = $allRows[0];

        if (empty($allRows[$id])) {
            throw new IdDoesNotExistException();
        }

        $resultRow = array_combine($columnTitles, $allRows[$id]);
        $resultRow['id'] = $id;

        return $resultRow;
    }

    public function getAll(): array
    {
        $rows = $this->getFileRows();
        $columnTitles = $rows[0];

        $resultData = [];
        $rowsWithoutTitles = $this->removeTitles($rows);
        foreach ($rowsWithoutTitles as $key => $row) {
            $resultRow = array_combine($columnTitles, $row);
            $resultRow['id'] = $key + 1;

            $resultData[] = $resultRow;
        }

        return $resultData;
    }

    public function insert(array $data): array
    {
        // TODO: Implement inserting a row.
        $data['id'] = 6; // just a dummy line, to make calling code work
        return $data;
    }

    public function update(int $id, array $data): void
    {
        // TODO: Implement row updating method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    private function getFileRows(): array
    {
        $filePath = $this->getFilePath();
        $file = fopen($filePath, 'r');

        $rows = [];
        while (($line = fgetcsv($file)) !== false) {
            $rows[] = $line;
        }

        fclose($file);

        return $rows;
    }

    private function getFilePath(): string
    {
        $databaseDir = Config::get('database.csv_database_dir');
        return $databaseDir . "/{$this->file}.csv";
    }

    private function removeTitles(array $rows): array
    {
        array_shift($rows);
        return $rows;
    }
}
