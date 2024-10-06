<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use function json_encode;
use function request;

abstract class Controller
{
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
            return $this->modelNotFoundResponse($result);
        }

        return $this->successfullResponse($result);
    }

    /**
     * @return JsonResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function new()
    {
        $modelData = request()->get('model_data');

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
            return $this->modelNotFoundResponse($result);
        }

        $modelData = request()->get('model_data');

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
            return $this->modelNotFoundResponse($result);
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
    protected function modelNotFoundResponse($result)
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
