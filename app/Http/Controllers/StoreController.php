<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiHandler;
use Carbon\Carbon;
use App\Store;

/*
* Swagger Specification
* http://swagger.io/specification/
*/

/**
* @SWG\Tag(
*   name="store",
*   description="Check Store",
*   @SWG\ExternalDocumentation(
*     description="Find out more",
*     url="http://swagger.io"
*   )
* )
*/

class StoreController extends Controller
{
  /**
  * @SWG\Get(
  *   path="/stores",
  *   tags={"store"},
  *   summary="list of stores",
  *   description="Returns a list of stores",
  *   produces={"application/json"},
  *   @SWG\Parameter(
  *       description="id of store to return",
  *       in="query",
  *       name="id",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="name of store to return",
  *       in="query",
  *       name="name",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="store_code of store to return",
  *       in="query",
  *       name="store_code",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="initial of store to return",
  *       in="query",
  *       name="initial",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="address of store to return",
  *       in="query",
  *       name="address",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="city of store to return",
  *       in="query",
  *       name="city",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="phone of store to return",
  *       in="query",
  *       name="phone",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Parameter(
  *       description="region of store to return",
  *       in="query",
  *       name="region",
  *       required=false,
  *       type="string"
  *    ),
  *   @SWG\Response(
  *       response=200,
  *       description="Successful operation",
  *       @SWG\Schema(ref="#/definitions/Store")
  *     ),
  *   @SWG\Response(
  *       response="400",
  *       description="Invalid store ID"
  *   ),
  *   @SWG\Response(
  *       response="404",
  *       description="Store not found"
  *   ),
  * )
  */
  public function index()
  {
    $store = new Store;
    return ApiHandler::parseMultiple($store, ['name', 'store_code', 'initial', 'address', 'city', 'phone', 'region'])->getResponse();
  }

  public function store(Request $request)
  {
    try {
      $data = [];

      if ($request->has('name')) {
        $data['name'] = $request->input('name');
      }

      if ($request->has('store_code')) {
        $data['store_code'] = $request->input('store_code');
      }

      if ($request->has('initial')) {
        $data['initial'] = $request->input('initial');
      }

      if ($request->has('address')) {
        $data['address'] = $request->input('address');
      }

      if ($request->has('city')) {
        $data['city'] = $request->input('city');
      }

      if ($request->has('phone')) {
        $data['phone'] = $request->input('phone');
      }

      if ($request->has('region')) {
        $data['region'] = $request->input('region');
      }

      if ($request->has('created_at')) {
        $data['created_at'] = $request->input('created_at');
      }

      if ($request->has('updated_at')) {
        $data['updated_at'] = $request->input('updated_at');
      }

      $record = Store::create($data);

      return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }

  public function show($id)
  {
    try {
      $check = Store::findOrFail($id);

      $store = new Store;
      return ApiHandler::parseSingle($store, $id)->getResponse();
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

      if ($request->has('store_id')) {
        $data['store_id'] = $request->input('store_id');
      }

      if ($request->has('created_at')) {
        $data['created_at'] = $request->input('created_at');
      }

      if ($request->has('updated_at')) {
        $data['updated_at'] = $request->input('updated_at');
      }

      Store::findOrFail($id)->update($data);
      $record = Store::find($id);

      return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }

  public function destroy($id)
  {
    try {
      $check = Store::findOrFail($id);

      $store = Store::destroy($id);
      return response()->json(['status' => 1, 'message' => 'success']);
    } catch (Exception $e) {
      return response()->json(['status' => 0, 'message' => $e]);
    }
  }
}
