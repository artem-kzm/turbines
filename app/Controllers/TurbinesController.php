<?php

namespace App\Controllers;

use App\Exceptions\Http;
use App\Exceptions\ModelNotFoundException;
use App\Models\Turbine;
use App\Requests\CreateTurbineRequest;
use App\Requests\UpdateTurbineRequest;

class TurbinesController extends BaseController
{
    public function getTurbines(): string
    {
        $turbines = Turbine::all();

        return JsonResponse::success($turbines->toArray());
    }

    /**
     * @throws Http\NotFoundException
     */
    public function getTurbine(int $id): string
    {
        try {
            $turbine = Turbine::getById($id);
        } catch (ModelNotFoundException) {
            throw new Http\NotFoundException();
        }

        return JsonResponse::success($turbine->toArray());
    }

    /**
     * @throws Http\NotFoundException
     */
    public function getTurbineAddress(int $id): string
    {
        try {
            $turbine = Turbine::getById($id);
        } catch (ModelNotFoundException) {
            throw new Http\NotFoundException();
        }

        return JsonResponse::success($turbine->address());
    }

    /**
     * @throws \App\Exceptions\ValidationException
     */
    public function createTurbine(): string
    {
        $request = new CreateTurbineRequest($this->requestParams());
        $request->validate();

        $turbine = Turbine::create($request->getAllParams());

        return JsonResponse::success($turbine->toArray());
    }

    /**
     * @throws \App\Exceptions\ValidationException
     * @throws Http\NotFoundException
     */
    public function updateTurbine(int $id): string
    {
        $request = new UpdateTurbineRequest($this->requestParams());
        $request->validate();

        try {
            Turbine::getById($id)->update($request->getAllParams());
        } catch (ModelNotFoundException) {
            throw new Http\NotFoundException();
        }

        return JsonResponse::success();
    }

    /**
     * @throws Http\NotFoundException
     */
    public function deleteTurbine(int $id): string
    {
        try {
            Turbine::getById($id)->delete();
        } catch (ModelNotFoundException) {
            throw new Http\NotFoundException();
        }

        return JsonResponse::success();
    }
}
