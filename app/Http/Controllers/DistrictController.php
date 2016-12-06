<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiHandler;
use Carbon\Carbon;
use App\District;

/*
 * Swagger Specification
 * http://swagger.io/specification/
 */

/**
 * @SWG\Tag(
 *   name="district",
 *   description="Check District",
 *   @SWG\ExternalDocumentation(
 *     description="Find out more",
 *     url="http://swagger.io"
 *   )
 * )
 */

class DistrictController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/districts",
     *   tags={"district"},
     *   summary="list of districts",
     *   description="Returns a list of districts",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *       description="id of district to return",
     *       in="query",
     *       name="id",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Parameter(
     *       description="name of district to return",
     *       in="query",
     *       name="name",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Parameter(
     *       description="city_id of district to return",
     *       in="query",
     *       name="city_id",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Response(
     *       response=200,
     *       description="Successful operation",
     *       @SWG\Schema(ref="#/definitions/District")
     *     ),
     *   @SWG\Response(
     *       response="400",
     *       description="Invalid district ID"
     *   ),
     *   @SWG\Response(
     *       response="404",
     *       description="District not found"
     *   ),
     * )
     */
    public function index()
    {
        $district = new District;
        return ApiHandler::parseMultiple($district, ['name', 'city_id'])->getResponse();
    }

    public function store(Request $request)
    {
        try {
            $data = [];

            if ($request->has('name')) {
                $data['name'] = $request->input('name');
            }

            if ($request->has('city_id')) {
                $data['city_id'] = $request->input('city_id');
            }

            if ($request->has('created_at')) {
                $data['created_at'] = $request->input('created_at');
            }

            if ($request->has('updated_at')) {
                $data['updated_at'] = $request->input('updated_at');
            }

            $record = District::create($data);

            return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }

      public function show($id)
    {
        try {
            $check = District::findOrFail($id);

            $district = new District;
            return ApiHandler::parseSingle($district, $id)->getResponse();
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

            if ($request->has('city_id')) {
                $data['city_id'] = $request->input('city_id');
            }

            if ($request->has('created_at')) {
                $data['created_at'] = $request->input('created_at');
            }

            if ($request->has('updated_at')) {
                $data['updated_at'] = $request->input('updated_at');
            }

            District::findOrFail($id)->update($data);
            $record = District::find($id);

            return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }

    public function destroy($id)
    {
        try {
            $check = District::findOrFail($id);

            $district = District::destroy($id);
            return response()->json(['status' => 1, 'message' => 'success']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }
}
