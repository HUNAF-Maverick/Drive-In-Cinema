<?php

namespace App\Http\Controllers;

use App\Models\ValidatableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use function json_encode;
use function request;

abstract class Controller
{
    /**
     * @var Model | ValidatableModel
     */
    protected Model $modelClass;

    public function __construct(Model $model)
    {
        $this->modelClass = $model;
    }

    /**
     * @return JsonResponse
     */
    public function getAll()
    {
        $modelCollection = $this->modelClass::query()->get();

        return JsonResponse::fromJsonString(
            $modelCollection,
            200
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $result = $this->getModel($id);
        if (!$result instanceof Model) {
            return $this->errorResponse($result);
        }

        return $this->successfullResponse($result);
    }

    /**
     * @return JsonResponse
     */
    public function new()
    {
        try {
            $modelData = request()->validate($this->modelClass->getValidationRules());
        }
        catch (ValidationException $e) {
            return $this->errorResponse($e);
        }

        $model = $this->modelClass->newInstance($modelData);

        if ($model->save()) {
            return $this->successfullResponse($model);
        }

        return JsonResponse::fromJsonString(
            $model,
            503
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function set(int $id)
    {
        $model = $this->getModel($id);
        if (!$model instanceof Model) {
            $result = $model;
            return $this->errorResponse($result);
        }

        try {
            $modelData = request()->validate($this->modelClass->getValidationRules());
        }
        catch (ValidationException $e) {
            return $this->errorResponse($e);
        }

        $model->fill($modelData);
        $model->save();

        return $this->successfullResponse($model);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id)
    {
        $model = $this->getModel($id);
        if (!$model instanceof Model) {
            $result = $model;
            return $this->errorResponse($result);
        }

        $deleting = clone $model;

        if ($model->delete()) {
            $this->successfullResponse($deleting);
        }

        return JsonResponse::fromJsonString(json_encode([
                'id' => $deleting->getKey(),
                'message' => $deleting::class . ' could not be deleted because it doesn\'t exists!'
            ]),
            503
        );
    }

    /**
     * @param int $id
     * @return Model|ModelNotFoundException|null
     */
    protected function getModel(int $id): Model | ModelNotFoundException | null
    {
        try {
            $queryResult = $this->modelClass::query()->findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return $e;
        }

        return $queryResult;
    }

    /**
     * @param $result
     * @return JsonResponse
     */
    protected function errorResponse($result)
    {
        return JsonResponse::fromJsonString(
            $result->getMessage(),
            503
        );
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    protected function successfullResponse($data)
    {
        return JsonResponse::fromJsonString(
            $data,
            200
        );
    }
}
