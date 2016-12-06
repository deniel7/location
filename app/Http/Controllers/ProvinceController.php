<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiHandler;
use Carbon\Carbon;
use App\Province;

/*
* Swagger Specification
* http://swagger.io/specification/
*/

/**
* @SWG\Tag(
*   name="province",
*   description="Check Province",
*   @SWG\ExternalDocumentation(
*     description="Find out more",
*     url="http://swagger.io"
*   )
* )
*/

class ProvinceController extends Controller
{
  /**
  * @SWG\Get(
  *   path="/provinces",
  *   tags={"province"},
  *   summary="list of provinces",
  *   description="Returns a list of provinces",
  *   produces={"application/json"},
  *   @SWG\Parameter(
  *       description="ID of province to return",
  *       in="query",
  *       name="id",
  *       required=false,
  *       type="number"
  *    ),
  *   @SWG\Parameter(
  *       description="name of province to return",
  *       in="query",
  *       name="name",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Response(
  *       response=200,
  *       description="Successful operation",
  *       @SWG\Schema(ref="#/definitions/Province")
  *     ),
  *   @SWG\Response(
  *       response="400",
  *       description="Invalid province ID"
  *   ),
  *   @SWG\Response(
  *       response="500",
  *       description="Province not found"
  *   ),
  * )
  */
  public function index(Request $request)
  {
    try {
      $province = new Province;
      return ApiHandler::parseMultiple($province, ['id', 'name'])->getResponse();
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e], 500);
    }
  }

  public function store(Request $request)
  {
    try {
      $data = [];

      if ($request->has('name')) {
        $data['name'] = $request->input('name');
      }

      if ($request->has('created_at')) {
        $data['created_at'] = $request->input('created_at');
      }

      if ($request->has('updated_at')) {
        $data['updated_at'] = $request->input('updated_at');
      }

      $record = Province::create($data);

      return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }

  public function show($id)
  {
    try {
      $check = Province::findOrFail($id);

      $province = new Province;
      return ApiHandler::parseSingle($province, $id)->getResponse();
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $data = [];

      if ($request->has('name')) {
        $data['name'] = $request->input('name');
      }

      if ($request->has('created_at')) {
        $data['created_at'] = $request->input('created_at');
      }

      if ($request->has('updated_at')) {
        $data['updated_at'] = $request->input('updated_at');
      }

      Province::findOrFail($id)->update($data);
      $record = Province::find($id);

      return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }

  public function destroy($id)
  {
    try {
      $check = Province::findOrFail($id);

      $province = Province::destroy($id);
      return response()->json(['status' => 1, 'message' => 'success']);
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }
}
