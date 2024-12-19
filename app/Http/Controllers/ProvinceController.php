<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $provinces = Province::all();

    return JsonResponse::success(
      data: ProvinceResource::collection($provinces)
    );
  }

  public function show($id)
  {
    $province = Province::find($id);

    return JsonResponse::success(
      data: new ProvinceResource($province)
    );
  }
}
