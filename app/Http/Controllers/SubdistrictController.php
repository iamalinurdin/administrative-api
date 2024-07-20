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
  public function __invoke(Request $request)
  {
    $district = $request->query('district_id');
    $subdistricts = Subdistrict::where('district_id', $district)->get();

    return JsonResponse::success(
      data: SubdistrictResource::collection($subdistricts)
    );
  }
}
