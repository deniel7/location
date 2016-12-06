<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiHandler;
use Carbon\Carbon;
use App\Zipcode;

/*
 * Swagger Specification
 * http://swagger.io/specification/
 */

/**
 * @SWG\Tag(
 *   name="zipcode",
 *   description="Check Zipcode",
 *   @SWG\ExternalDocumentation(
 *     description="Find out more",
 *     url="http://swagger.io"
 *   )
 * )
 */

class ZipcodeController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/zipcodes",
     *   tags={"zipcode"},
     *   summary="list of zipcodes",
     *   description="Returns a list of zipcodes",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *       description="id of zipcode to return",
     *       in="query",
     *       name="id",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Parameter(
     *       description="name of zipcode to return",
     *       in="query",
     *       name="name",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Parameter(
     *       description="district_id of city to return",
     *       in="query",
     *       name="district_id",
     *       required=false,
     *       type="string"
     *    ),
     *   @SWG\Response(
     *       response=200,
     *       description="Successful operation",
     *       @SWG\Schema(ref="#/definitions/Zipcode")
     *     ),
     *   @SWG\Response(
     *       response="400",
     *       description="Invalid zipcode ID"
     *   ),
     *   @SWG\Response(
     *       response="404",
     *       description="Zipcode not found"
     *   ),
     * )
     */
    public function index()
    {
        $zipcode = new Zipcode;
        return ApiHandler::parseMultiple($zipcode, ['name', 'zipcode_id'])->getResponse();
    }

    public function store(Request $request)
    {
        try {
            $data = [];

            if ($request->has('name')) {
                $data['name'] = $request->input('name');
            }

            if ($request->has('zipcode_id')) {
                $data['zipcode_id'] = $request->input('zipcode_id');
            }

            if ($request->has('created_at')) {
                $data['created_at'] = $request->input('created_at');
            }

            if ($request->has('updated_at')) {
                $data['updated_at'] = $request->input('updated_at');
            }

            $record = Zipcode::create($data);

            return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }

    public function show($id)
    {
        try {
            $check = Zipcode::findOrFail($id);

            $zipcode = new Zipcode;
            return ApiHandler::parseSingle($zipcode, $id)->getResponse();
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

            if ($request->has('zipcode_id')) {
                $data['zipcode_id'] = $request->input('zipcode_id');
            }

            if ($request->has('created_at')) {
                $data['created_at'] = $request->input('created_at');
            }

            if ($request->has('updated_at')) {
                $data['updated_at'] = $request->input('updated_at');
            }

            Zipcode::findOrFail($id)->update($data);
            $record = Zipcode::find($id);

            return response()->json(['status' => 1, 'message' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }
    public function destroy($id)
    {
        try {
            $check = Zipcode::findOrFail($id);
            $zipcode = Zipcode::destroy($id);
            return response()->json(['status' => 1, 'message' => 'success']);
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e]);
        }
    }
}
