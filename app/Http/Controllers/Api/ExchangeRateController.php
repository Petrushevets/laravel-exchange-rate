<?php

namespace App\Http\Controllers\Api;

use App\Filter\Filter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExchangeRateResource;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ExchangeRateController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $rates = (new Filter(ExchangeRate::query(), $request->all()))->apply()->get();

        return ExchangeRateResource::collection($rates);
    }
}
