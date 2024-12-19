<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function index(Request $request)
  {
    $city = $request->query('city_id');
    $districts = District::where('city_id', $city)->get();

    return JsonResponse::success(
      data: DistrictResource::collection($districts)
    );
  }

  public function show($id)
  {
    $district = District::find($id);

    return JsonResponse::success(
      data: new DistrictResource($district)
    );
  }
}
