<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait ResponseTrait
{

    // to return data
    public function returnData($value, $msg = "Data Sent Successfully")
    {
        return response()->json([
            'status' => 200,
            'data' => $value,
            'msg' => $msg
        ]);
    }

    // to return Success message
    public function returnSuccessMessage($msg = "")
    {
        return response()->json([
            'status' => 200,
            'msg' => $msg
        ]);
    }

    // to return error message
    public function returnError($msg , $status=422)
    {
        return response()->json([
            'status' => $status,
            'data' => NULL,
            'msg' => $msg,
        ]);
    }

    // to return not founded message
    public function returnMissing($id , $type)
    {
        return response()->json([
            'status' => 404,
            'data' => NULL,
            'msg' => 'No '.$type.' Founded With #ID '.$id,

        ]);
    }

    // to return error of the validation
    public function returnValidationError($validator)
    {
        return $this->returnError($validator->errors()->first() , 422);
    }

}
