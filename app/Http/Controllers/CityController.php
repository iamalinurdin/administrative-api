<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $province = $request->query('province_id');
    $cities = City::where('province_id', $province)->get();

    return JsonResponse::success(
      data: CityResource::collection($cities)
    );
  }
}
