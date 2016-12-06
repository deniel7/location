<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiHandler;
use Carbon\Carbon;
use App\City;

/*
 * Swagger Specification
 * http://swagger.io/specification/
 */

/**
 * @SWG\Tag(
 *   name="city",
 *   description="Check City",
 *   @SWG\ExternalDocumentation(
 *     description="Find out more",
 *     url="http://swagger.io"
 *   )
 * )
 */

class CityController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/cities",
     *   tags={"city"},
     *   summary="list of cities",
     *   description="Returns a list of cities",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *       description="id of city to return",
     *       in="query",
     *       name="id",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Parameter(
     *       description="name of city to return",
     *       in="query",
     *       name="name",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Parameter(
     *       description="province_id of city to return",
     *       in="query",
     *       name="province_id",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Response(
     *       response=200,
     *       description="Successful operation",
     *       @SWG\Schema(ref="#/definitions/City")
     *     ),
     *   @SWG\Response(
     *       response="400",
     *       description="Invalid city ID"
     *   ),
     *   @SWG\Response(
     *       response="404",
     *       description="City not found"
     *   ),
     * )
     */
    public function index()
    {
        $city = new City;
        return ApiHandler::parseMultiple($city, ['name', 'province_id'])->getResponse();
    }

    public function store(Request $request)
    {
        try {
            $data = [];

            if ($request->has('name')) {
                $data['name'] = $request->input('name');
            }

            if ($request->has('province_id')) {
                $data['province_id'] = $request->input('province_id');
            }

            if ($request->has('created_at')) {
                $data['created_at'] = $request->input('created_at');
            }

            if ($request->has('updated_at')) {
                $data['updated_at'] = $request->input('updated_at');
            }

            $record = City::create($data);

            return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }

  public function show($id)
    {
        try {
            $check = City::findOrFail($id);

            $city = new City;
            return ApiHandler::parseSingle($city, $id)->getResponse();
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

            if ($request->has('province_id')) {
                $data['province_id'] = $request->input('province_id');
            }

            if ($request->has('created_at')) {
                $data['created_at'] = $request->input('created_at');
            }

            if ($request->has('updated_at')) {
                $data['updated_at'] = $request->input('updated_at');
            }

            City::findOrFail($id)->update($data);
            $record = City::find($id);

            return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }

    public function destroy($id)
    {
        try {
            $check = City::findOrFail($id);

            $city = City::destroy($id);
            return response()->json(['status' => 1, 'message' => 'success']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }
}
