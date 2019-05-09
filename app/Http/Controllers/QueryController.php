<?php

namespace App\Http\Controllers;

use App\Http\Transformers\WeatherStatTransformer;
use App\Models\City;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function current($city) {
        if(!($city = City::where('name', $city)->first()))
            throw new NotFoundHttpException('Unknown city!');

        return $this->response->item($city->weatherStats()->first(),
            new WeatherStatTransformer()
        );
    }

    public function all($city){
        if(!($city = City::where('name', $city)->first()))
            throw new NotFoundHttpException('Unknown city!');

        return $this->response->collection($city->weatherStats, new WeatherStatTransformer());

    }
}
