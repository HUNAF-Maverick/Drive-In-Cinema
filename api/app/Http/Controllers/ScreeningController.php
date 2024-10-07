<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use Illuminate\Http\JsonResponse;

class ScreeningController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Screening());
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
}
