<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Resources\SubdistrictResource;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class SubdistrictController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function index(Request $request)
  {
    $district = $request->query('district_id');
    $subdistricts = Subdistrict::where('district_id', $district)->get();

    return JsonResponse::success(
      data: SubdistrictResource::collection($subdistricts)
    );
  }

  public function show($id)
  {
    $subdistrict = Subdistrict::find($id);

    return JsonResponse::success(
      data: new SubdistrictResource($subdistrict)
    );
  }
}
