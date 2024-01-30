<?php

namespace App\Requests;

use App\Exceptions\ValidationException;

class CreateTurbineRequest extends BaseRequest
{
    private array $requiredParams = [
      'name',
      'producer',
      'coordinateN',
      'coordinateW',
    ];

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
        $errors = [];
        foreach ($this->requiredParams as $requiredParam) {
            if (empty($this->fields[$requiredParam])) {
                $errors[$requiredParam] = "Required parameter '{$requiredParam}' is missing";
            }
        }

        return $errors;
    }
}
