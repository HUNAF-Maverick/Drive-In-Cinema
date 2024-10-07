<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Database\Eloquent\Model;

class FilmController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Film());
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScreenings(int $id)
    {
        /**
         * @var Film $film
         */
        $film = $this->getModel($id);

        if (!$film instanceof Model) {
            $result = $film;
            return $this->errorResponse($result);
        }

        return $this->successfullResponse($film->screenings()->get());
    }
}
