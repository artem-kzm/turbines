<?php

namespace App\Requests;

use App\Exceptions\ValidationException;

/**
 * This is just a dummy class, see more in CreateTurbineRequest
 */
class UpdateTurbineRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function getAllParams(): array
    {
        return [
            'name' => $this->fields['name'],
            'producer' => $this->fields['producer'],
            'coordinateN' => $this->fields['coordinateN'],
            'coordinateW' => $this->fields['coordinateW'],
        ];
    }

    /**
     * @throws ValidationException
     */
    public function validate(): void
    {
        $errors = $this->findErrors();

        if ($errors) {
            throw new ValidationException($errors);
        }
    }

    private function findErrors(): array
    {
        return [];
    }
}
